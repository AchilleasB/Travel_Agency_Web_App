<script setup>
import ReservationRow from '../components/reservation/ReservationRow.vue';
import { useReservationStore } from '../stores/reservation';
import { onMounted, ref } from 'vue';
import { useUserStore } from '../stores/user';
import { useTripStore } from '../stores/trip';
import { useRouter } from 'vue-router';

const router = useRouter();
const userStore = useUserStore();
const reservationStore = useReservationStore();
const tripStore = useTripStore();

const allReservationInformation = ref([]);
const user_id = userStore.id;

const getUserReservations = async () => {
    try {
        const reservations = await reservationStore.getUserReservations(user_id);
        allReservationInformation.value = await addExtraReservationInfo(reservations);
    } catch (error) {
        if (error.response && error.response.status === 401) {
            userStore.logout();
            router.push({ name: 'account' });
        }
    }
};

const getAllReservations = async () => {
    try {
        const reservations = await reservationStore.getReservations();
        allReservationInformation.value = await addExtraReservationInfo(reservations);
    } catch (error) {
        if (error.response && error.response.status === 401) {
            userStore.logout();
            router.push({ name: 'account' });
        }
    }

};

const addExtraReservationInfo = async (reservations) => {
    return Promise.all(reservations.map(async (reservation) => {
        const customerData = await reservationStore.getCustomerData(reservation.user_id);
        const customerName = customerData.username;
        const tripData = await tripStore.getTripData(reservation.trip_id);
        const tripName = tripData.name;
        const tripImage = tripData.image_path;
        const tripDate = new Date(tripData.departure_date.date).toISOString().substring(0, 10);
        return { ...reservation, customerName, tripName, tripImage, tripDate };
    }));
};

onMounted(async () => {
    if (!userStore.isAuthenticated) {
        router.push({ name: 'account' });
    }

    try {
        if (userStore.isAdmin) {
            await getAllReservations();
        } else {
            await getUserReservations();
        }
    } catch (error) {
        console.error(error);
    }
});

</script>

<template>
    <div class="reservations-container">
        <h3 class="title d-flex justify-content-center">Reservations</h3>
        <div class=" row reservation-labels-container">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <div class="row d-flex align-items-center border-botttom">
                        <div class="col">
                            <div class="item-data-label border-bottom">Id</div>
                        </div>
                        <div class="col">
                            <div class="item-data-label border-bottom">Name</div>
                        </div>
                        <div class="col">
                            <div class="item-data-label border-bottom">Image</div>
                        </div>
                        <div class="col">
                            <div class="item-data-label border-bottom">Place</div>
                        </div>
                        <div class="col">
                            <div class="item-data-label border-bottom">Date</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="reservations-items-container border-bottom">
            <ReservationRow v-for="reservation in allReservationInformation" :key="reservation.id"
                :reservationId=reservation.id :userId=reservation.user_id :customerName=reservation.customerName
                :tripId=reservation.trip_id :tripName=reservation.tripName :tripImage=reservation.tripImage
                :tripDate=reservation.tripDate :numberOfTravellers=reservation.num_of_travellers
                :totalPrice=reservation.total_price :status=reservation.status />
        </div>
    </div>
</template>

<style scoped>
.reservations-container {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin: 2em;
}

.reservation-labels-container {
    background-color: #ffffff;
}

.title {
    margin-bottom: 2em;
}

.item-data-label {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>