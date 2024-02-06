<script setup>
import { computed } from 'vue';
import { parse, format } from 'date-fns';
import { useRouter } from 'vue-router';

const props = defineProps(['tripId', 'name', 'image', 'description',
    'departure_date', 'duration', 'price',
    'hotel_name', 'hotel_stars', 'meal_type',
    'category']);

const router = useRouter();

const formattedDepartureDate = computed(() => {
    // retrieve the date portion from the date object and omit the time
    const [date] = props.departure_date.date.split(' ');
    console.log(date);
    const parsedDate = parse(date, 'yyyy-MM-dd', new Date());
    console.log(parsedDate);
    return format(parsedDate, 'dd MMM yyyy');
});

// Maybe I should pass the tripId as a function parameter already
// Will keep in mind for when reservation is implemented
const reserveTrip = () => {
    // TODO: implement the JWT authentication before working on this
    const userId = localStorage.getItem('user_id');

    router.push({
        name: 'reservation',
        params: {
            userId: userId,
            tripId: props.tripId
        }
    });
};
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
                <button @click="reserveTrip()" class="reserve-button">Reserve</button>
            </div>
        </div>
    </div>
</template>

<style scoped>
.trip-card {
    border-radius: 5px;
    box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.2);
    background-color: rgba(241, 239, 235, 0.83);
    font-size: 18px;
}

.image-container {
    position: relative;
}

.image {
    width: 100%;
    height: 300px;
    object-fit: cover;
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

.left-details p, .right-details p, .price-container p{
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
.reserve-button {
    margin: 1rem;
    background-color: #3e66f3;
    border: none;
    font-size: 1.5rem;
    color: #fff;
    padding: 15px 20px;
    width: 50%;
}

</style>    
