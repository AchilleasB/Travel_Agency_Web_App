<script setup>
import ReservationRow from '../components/reservation/ReservationRow.vue';
import { useReservationStore } from '../stores/reservation';
import { onBeforeMount, ref } from 'vue';
import { useUserStore } from '../stores/user';
import { useRouter } from 'vue-router';

const router = useRouter();
const userStore = useUserStore();
const reservationStore = useReservationStore();

const user_id = userStore.id;
const reservations = ref([]);

const getUserReservations = async () => {
    const response = await reservationStore.fetchReservationData(user_id);
    reservations.value = response.data;
    console.log(reservations.value);
};

const getAllReservations = async () => {
    const response = await reservationStore.getReservations();
    reservations.value = response.data;
    console.log(reservations.value);
};

onBeforeMount(async() => {
    if (!userStore.isAuthenticated) {
        router.push({ name: 'account' });
    } else if (userStore.isAdmin) {
        await getAllReservations();
    } else {
        await getUserReservations();
    }

});

</script>

<template>
    <div class="reservations-container">
        <h3 class="d-flex justify-content-center">Your reservations</h3>
        <div class="row">
            <div class="col-sm-6 col-md-8 text-center w-65">
                <div class="row d-flex align-items-center border-botttom">
                    <div class="col">
                        <div class="item-data-label border-bottom">Image</div>
                    </div>
                    <div class="col">
                        <div class="item-data-label border-bottom">Place</div>
                    </div>
                    <div class="col">
                        <div class="item-data-label border-bottom">Date</div>
                    </div>
                    <div class="col">
                        <div class="item-data-label border-bottom">Status</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="reservation-row-container">
            <ReservationRow v-for="reservation in reservations" :key="reservation.id"
                                    :reservationId="reservation.id"
                                    :userId="reservation.user_id"
                                    :tripId="reservation.trip_id"
                                    :numOfTravellers="reservation.num_of_travellers"
                                    :totalPrice="reservation.total_price"
                                    :status="reservation.status" />
        </div>
    </div>
</template>

<style scoped>
.reservations-container {
    border: red solid 1px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.reservation-row-container {
    margin-top: 1em;
    border: blue solid 1px;
    width: 100%;
    height: auto;
}

.item-data-label {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    margin: 3em;    
}
</style>