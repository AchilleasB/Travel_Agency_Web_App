<script setup>
import DestinationCard from '../components/DestinationCard.vue';
import { ref, onMounted } from 'vue';
import axios from '../axios-auth';
import { useRouter } from 'vue-router';

const router = useRouter();
const destinations = ref([]);
// console.log(destinations);

const getDestinations = async () => {
    const response = await axios.get('destinations');
    destinations.value = response.data;
};

const navigateToTrips = (destinationId) => {
    router.push({ name: 'destination-trips', params: { id: destinationId } });
    console.log(destinationId);
}

onMounted(() => {
    getDestinations();
});

</script>

<template>
    <div class="container">
        <h3 class="d-flex justify-content-center">Select a continent to travel to</h3>
        <div class="destination-cards">
            <DestinationCard 
                v-for="destination in destinations" 
                    :key="destination.id" 
                    :destinationId="destination.id"
                    :destinationName="destination.name" 
                    :image="destination.image_path" 
                    :description="destination.description"
                    @click="navigateToTrips(destination.id)" />
        </div>
    </div>
</template>

