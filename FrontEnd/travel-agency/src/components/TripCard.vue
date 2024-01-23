<script setup>

const props = defineProps(['name', 'image', 'description',
                            'departure_date', 'duration', 'price', 
                            'hotel_name', 'hotel_stars', 'meal_type',
                            'category']);
console.log(props);


</script>

<template>
    <div class="trip-card w-75 m-auto mt-5 mb-5">
        <img :src="image" class="image" alt="Image of a destination">
        <div class="card-body">
            <h5 class="card-title">{{ name }}</h5>
            <p class="card-text">{{ description }}</p>
            <p class="card-text">Departure date: {{ departure_date }}</p>
            <p class="card-text">Duration: {{ duration }}</p>
            <p class="card-text">Price: {{ price }}</p>
            <p class="card-text">Hotel name: {{ hotel_name }}</p>
            <p class="card-text">Hotel stars: {{ hotel_stars }}</p>
            <p class="card-text">Meal type: {{ meal_type }}</p>
            <p class="card-text">Category: {{ category }}</p>
        </div>
    </div>
</template>
