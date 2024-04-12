<script setup>
import ReservationForm from './reservation/ReservationForm.vue';
import { useRouter } from 'vue-router';
import { ref, computed } from 'vue';
import { parse, format } from 'date-fns';
import { useUserStore } from '../stores/user';

const userStore = useUserStore();
const router = useRouter();

const props = defineProps(['tripId', 'name', 'image', 'description',
    'departure_date', 'duration', 'price',
    'hotel_name', 'hotel_stars', 'meal_type',
    'category']);


const formattedDepartureDate = computed(() => {
    // retrieve the date portion from the date object and omit the time
    const [date] = props.departure_date.date.split(' ');
    console.log(date);
    const parsedDate = parse(date, 'yyyy-MM-dd', new Date());
    console.log(parsedDate);
    return format(parsedDate, 'dd MMM yyyy');
});

const isFormVisible = ref(false);


const checkLoggedIn = () => {
    if (!userStore.username) {
        // User is not logged in, display a message and redirect to /login
        alert('You must log in first.');
        router.push('/account');
    } else {
        isFormVisible.value = true;
    }
}

const fillOutFormClick = () => {
    checkLoggedIn();
}

const cancelReservationForm = () => {
    isFormVisible.value = false;
}

</script>

<template>
    <div class="trip-card w-75 m-auto mt-5 mb-5">
        <div class="image-container">
            <img :src="image" class="image" alt="Image of a destination">
            <div class="group-container">
                <p class="group">{{ category }}</p>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ name }}</h5>
            <p class="trip-description">{{ description }}</p>
            <div class="details-container">
                <div class="left-details">
                    <label for="trip-departure-date">Departure date:</label>
                    <p class="trip-departure-date">{{ formattedDepartureDate }}</p>
                    <label for="trip-duration">Duration:</label>
                    <p class="trip-duration">{{ duration }} days</p>
                </div>
                <div class="right-details">
                    <label for="hotel-details">Hotel details:</label>
                    <p class="hotel-details">
                        {{ hotel_name }} {{ hotel_stars }}*
                        <br>
                        {{ meal_type }}
                    </p>
                </div>
            </div>
            <div class="price-container">
                <label for="trip-price">Price:</label>
                <p class="trip-price">{{ price }} €</p>
                <button v-if="!isFormVisible" @click="fillOutFormClick" class="fill-out-form-button">Fill out the
                    reservation form</button>
            </div>
        </div>
        <div v-if="isFormVisible" class="form-container">
            <ReservationForm :tripId="tripId" :name="name" :departureDate="formattedDepartureDate" :price="price" />
            <button @click.prevent="cancelReservationForm" type="submit" class="cancel-form-button">Close form</button>
        </div>
    </div>
</template>

<style scoped>
.trip-card {
    border-radius: 5px;
    box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);
    background-color: rgba(241, 239, 235, 0.83);
    font-size: 18px;
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
}

.trip-card:hover {
    transform: scale(1.05);
    filter: brightness(100%);
}

.trip-card:hover .image{
    filter: brightness(100%);
}

.image-container {
    position: relative;
}

.image {
    width: 100%;
    height: 300px;
    object-fit: cover;
    filter: brightness(80%);
    transition: transform .4s ease-in-out;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.group-container {
    position: absolute;
    max-height: 30px;
    bottom: 10px;
    right: 10px;
    background-color: rgba(255, 183, 0, 0.652);
    padding: 3px;
    border-radius: 3px;
}

.group {
    color: white;
    font-weight: bold;
}

.card-body {
    padding: 1.5rem;
}

.card-title {
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
}

.details-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 1.5rem;
}

.left-details {
    width: 50%;
    display: flex;
    flex-direction: column;
    margin: 0 0 0 30px;
}

.right-details {
    width: 25%;
    display: flex;
    flex-direction: column;
    margin: 0 0 auto;
}

.left-details p,
.right-details p,
.price-container p {
    font-weight: bold;
}

.trip-description {
    margin: 1.5rem;
}

.price-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.fill-out-form-button {
    margin: 1rem;
    background-color: #3e66f3;
    border: none;
    font-size: 1rem;
    color: #fff;
    padding: 15px 20px;
    width: 50%;
}

.cancel-form-button {
    margin: 1rem;
    background-color: #8c2323;
    border: none;
    font-size: 1rem;
    color: #fff;
    padding: 10px 10px;
    width: 30%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
</style>    
