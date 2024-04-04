<script setup>
import { onMounted, ref } from 'vue';
import ReservationRow from '../components/reservation/ReservationRow.vue';
import { useReservationStore } from '../stores/reservation';
import { useUserStore } from '../stores/user';
import { useRouter } from 'vue-router';

const router = useRouter();
const userStore = useUserStore();

const user_id = userStore.id;
const reservations = ref([]);

const getUserReservations = async () => {
    const useReservation = useReservationStore();
    const response = await useReservation.fetchReservationData(user_id);
    reservations.value = response.data;
};

onMounted(() => {
    if (!userStore.isAuthenticated) {
        router.push({ name: 'account' });
    }

    getUserReservations();
    console.log("Reservations in onMounted:", reservations.value);
});

</script>

<template>
    <div class="reservations-container">
        <h3 class="d-flex justify-content-center">Your reservations</h3>
        <div class="row">
            <div class="col-md-6 col-md-6 text-center w-100">
                <div class="row d-flex align-items-center border-botttom">
                    <div class="col">
                        <div class="item-data-label border-bottom"><i class="fa-solid fa-image"></i>Image</div>
                    </div>
                    <div class="col">
                        <div class="item-data-label border-bottom"><i class="fa-solid fa-globe"></i> Place</div>
                    </div>
                    <div class="col">
                        <div class="item-data-label border-bottom"><i class="fa-solid fa-calendar-days"></i> Date</div>
                    </div>
                    <div class="col">
                        <div class="item-data-label border-bottom"><i class="fa-solid fa-circle-info"></i> Details</div>
                    </div>
                    <div class="col">
                        <div class="item-data-label border-bottom"><i class="fa-solid fa-xmark"></i> Cancel</div>
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
                                    :totalPrice="reservation.total_price" />
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