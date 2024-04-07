<script setup>
import DestinationCard from '../components/DestinationCard.vue';
import { ref, onMounted } from 'vue';
import axios from '../axios-auth';
import { useRouter } from 'vue-router';

const router = useRouter();
const destinations = ref([]);

const getDestinations = async () => {
    const response = await axios.get('destinations');
    destinations.value = response.data;

    console.log(destinations.value);
};

const navigateToTrips = (destinationId) => {
    router.push({ name: 'destination-trips', params: { id: destinationId } });
}

onMounted(() => {
    getDestinations();
});

</script>

<template>
    <div class="container">
        <h3 class="d-flex justify-content-center">Travel to any corner of the planet</h3>
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

<style scoped>
 .container {
     margin: 0 auto;
     }
</style>

