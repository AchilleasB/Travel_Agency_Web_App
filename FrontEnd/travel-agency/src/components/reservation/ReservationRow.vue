<script setup>
import { ref, onMounted } from 'vue';
import ReservationDetails from './ReservationDetails.vue';
import { useReservationStore } from '../../stores/reservation';
import axios from '../../axios-auth';

const reservationStore = useReservationStore();

const props = defineProps(['reservationId', 'userId', 'tripId', 'numOfTravellers', 'totalPrice']);

const trip = ref({});

const getTripById = async () => {
    const response = await axios.get('trips/' + props.tripId);
    trip.value = response.data;
    console.log(trip.value);
};

const isRowVisible = ref(false);

const showTripDetails = () => {
    isRowVisible.value = true;
}

const hideTripDetails = () => {
    isRowVisible.value = false;
}

const cancelReservation = async () => {
    // display alert to confirm the action
    if (confirm('Are you sure you want to cancel this reservation?')) {
        reservationStore.deleteReservation();
    }
};

onMounted(() => {
    getTripById();
});

</script>

<template>
    <div class="row border-bottom">
        <div class="col-sm-6 col-md-8 text-center">
            <div class="row d-flex align-items-center">
                <div class="col">
                    <span class="item-data-value">{{ props.reservationId }}</span>
                </div>
                <div class="col">
                    <span class="item-data-value">{{ props.userId }}</span>
                </div>
                <div class="col">
                    <span class="item-data-value">{{ props.tripId }}</span>
                </div>
                <div class="col">
                    <span class="item-data-value">{{ props.numOfTravellers }}</span>
                </div>
                <div class="col">
                    <span class="item-data-value">{{ props.totalPrice }}</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 d-flex mt-3 mb-3 d-flex m-auto mt-3">
            <div class="row">
                <div class="col">
                    <span class="item-data-value">
                        <button v-if="!isRowVisible" @click="showTripDetails" class="trip-details-button">Details</button>
                    </span>
                </div>
                <div class="col">
                    <span class="item-data-value">
                        <button @click="cancelReservation" class="btn btn-outline-danger cancel-reservation-button">Cancel</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div v-if="isRowVisible" class="details-container">
        <ReservationDetails :tripId="props.tripId"
                            :tripName="trip.name"
                            :tripDepartureDate="trip.departure_date"
                            :tripDuration="trip.duration"
                            :tripHotelName="trip.accommodation.hotel_name"
                            :tripHotelStars="trip.accommodation.hotel_stars"
                            :tripMealType="trip.accommodation.meal_type"
                             />
        <button @click.prevent="hideTripDetails" type="submit" class="hide-details-button">Hide</button>
    </div>
</template>

<style scoped>
    .border-bottom {
        border-bottom: 1px solid #125408;
    }
    .item-data-value {
        font-size: 1.2em;
    }
    .trip-details-button {
        background-size: cover;
        width: 30px;
        height: 30px;
        border: none;
    }
    .hide-details-button {
        background-size: cover;
        width: 30px;
        height: 30px;
        border: none;
    }
    .cancel-reservation-button {
        width: 100px;
    }

</style>
