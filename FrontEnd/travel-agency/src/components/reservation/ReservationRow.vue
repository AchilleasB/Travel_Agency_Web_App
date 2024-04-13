<script setup>
import { ref } from 'vue';
import ReservationDetails from './ReservationDetails.vue';
import { useReservationStore } from '../../stores/reservation';
import { useUserStore } from '../../stores/user';
import { useTripStore } from '../../stores/trip';

const reservationStore = useReservationStore();
const userStore = useUserStore();
const tripStore = useTripStore();

const props = defineProps(['reservationId', 'userId', 'customerName',
    'tripId', 'tripName', 'tripImage', 'tripDate',
    'totalPrice', 'numberOfTravellers', 'status'
]);

// console.log(props);

const trip = ref({});

const getTripData = async () => {
    const response = await tripStore.getTripData(props.tripId);
    trip.value = response;
};

const isRowVisible = ref(false);

const showTripDetails = async () => {
    await getTripData();
    // console.log("Trip in showTripDetails:", trip.value);
    isRowVisible.value = true;
}

const hideTripDetails = () => {
    isRowVisible.value = false;
}

const cancelReservation = async () => {
    if (confirm('Are you sure you want to cancel this reservation?')) {
        await reservationStore.deleteReservation(props.reservationId);
        window.location.reload();
    }
};

const approveReservation = async () => {
    if (reservationStore.status == 'Approved') {
        alert('Reservation already approved');
    } else if (confirm('Are you sure you want to approve this reservation?')) {
        await reservationStore.approveReservation(props.reservationId);
        window.location.reload();
    }
};

</script>

<template>
    <div class="row">
        <div class="col-sm-6 col-md-8">
            <div class="row d-flex align-items-center border-botttom border-top">
                <div class="col">
                    <span class="item-data-value">{{ props.reservationId }}</span>
                </div>
                <div class="col">
                    <span class="item-data-value">{{ props.customerName }}</span>
                </div>
                <div class="col">
                    <span class="item-data-value">
                    <img :src="props.tripImage" alt="A trip image" class="trip-image"></span>
                </div>
                <div class="col">
                    <span class="item-data-value">{{ props.tripName }}</span>
                </div>
                <div class="col">
                    <span class="item-data-value">{{ props.tripDate }}</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 d-flex ">
            <div class="row border-botttom border-top pt-3 pb-3">
                <div class="col">
                    <span class="item-data-value">
                        <button v-if="!isRowVisible" @click="showTripDetails"
                            class="btn btn-outline-primary trip-details-button">Details</button>
                    </span>
                </div>
                <div class="col">
                    <span v-if="props.status !== 'Approved'" class="item-data-value">
                        <button @click="cancelReservation"
                            class="btn btn-outline-danger cancel-reservation-button">Cancel</button>
                    </span>
                </div>
                <div class="col">
                    <span v-if="props.status !== 'Approved' && userStore.isAdmin" class="item-data-value">
                        <button @click="approveReservation"
                            class="btn btn-outline-success approve-reservation-button">Approve</button>
                    </span>
                    <span v-if="props.status === 'Approved'" class="item-data-value">
                        <button class="btn btn-dark approve-reservation-button" disabled>Approved</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div v-if="isRowVisible" class="details-container border-bottom">
        <ReservationDetails :tripId="props.tripId" 
                            :tripName="trip.name" 
                            :tripDepartureDate="props.tripDate"
                            :tripDuration="trip.duration" 
                            :tripHotelName="trip.accommodation.hotel_name"
                            :tripHotelStars="trip.accommodation.hotel_stars" 
                            :tripMealType="trip.accommodation.meal_type"
                            :tripPrice="props.totalPrice" 
                            :tripNumOfTravellers="props.numberOfTravellers" />
        <button @click.prevent="hideTripDetails" type="submit"
            class="btn btn-outline-danger hide-details-button">Hide details
        </button>
    </div>
</template>

<style scoped>
.details-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 1em;
    margin-bottom: 1em;
}

.item-data-value {
    display: flex;
    justify-content: center;
    align-items: center;
}

.trip-image {
    width: 5em;
    height: 5em;
    object-fit: cover;
    padding: .2em;
}

.hide-details-button {
    position:relative;
    right: 15%;
    margin-top: 1em;
    justify-content: left;
    padding: .5em;
    margin: 1em;
}

</style>
