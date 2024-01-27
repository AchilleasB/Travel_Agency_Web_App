<script setup>
import TripCard from '../components/TripCard.vue';
import { ref, onMounted, watchEffect } from 'vue';
import { useRouter } from 'vue-router';
import axios from '../axios-auth';

const router = useRouter();
const trips = ref([]);
console.log(trips);

const getTrips = async () => {
    const response = await axios.get('trips');
    trips.value = response.data;
};

const props = defineProps(['id'], String);
console.log(props.id);

const routeName = router.currentRoute.value.name;
const categoryOrDestinationId  = ref(null);

watchEffect(() => {
    categoryOrDestinationId.value = router.currentRoute.value.params.id;
    console.log('Route Name:', routeName);
    console.log('Category or Destination ID:', categoryOrDestinationId.value);
});

const filteredTrips = ref([]);

watchEffect(() => {
    filteredTrips.value = trips.value.filter(trip => {
            if (routeName === 'destination-trips') {
                return trip.destination_id === categoryOrDestinationId.value;
            } else if (routeName === 'category-trips') {
                return trip.category_id === categoryOrDestinationId.value;
            }
        });
});

onMounted(() => {
    console.log('Component mounted');
    getTrips();
});

</script>

<template>
    <div class="container">
        <h3 class="d-flex justify-content-center">Where would you like to go?</h3>
        <div v-if="filteredTrips.length > 0">
            <TripCard v-for="trip in filteredTrips" :key="trip.id" 
                                            :name="trip.name" 
                                            :image="trip.image_path" 
                                            :description="trip.description"
                                            :departure_date="trip.departure_date"
                                            :duration="trip.duration"
                                            :price="trip.price"
                                            :hotel_name="trip.accommodation.hotel_name"
                                            :hotel_stars="trip.accommodation.hotel_stars"
                                            :meal_type="trip.accommodation.meal_type"
                                            :category="trip.category.category_type"
                                             />
        </div>
        <div v-else>
            <h2>No trips available.</h2>
        </div>
    </div>
</template>