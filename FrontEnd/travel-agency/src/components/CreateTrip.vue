<script setup>
import { ref, onMounted } from 'vue';
import axios from '../axios-auth';

const trip = ref({
    name: '',
    image_path: '',
    description: '',
    departure_date: '',
    duration: 0,
    available: true,
    price: 0,
    category_id: 0,
    accommodation_id: 0,
    destination_id: 0,
});

const categories = ref([]);
const accommodations = ref([]);
const destinations = ref([]);

const getCategories = async () => {
    const response = await axios.get('categories');
    console.log("Data: " , response.data);
    categories.value = response.data;
};

const getAccommodations = async () => {
    const response = await axios.get('accommodations');
    accommodations.value = response.data;
};

const getDestinations = async () => {
    const response = await axios.get('destinations');
    destinations.value = response.data;
};

const createTrip = async () => {
    const response = await axios.post('trips', trip.value);
    console.log(response.data);
};

onMounted(() => {
    getCategories();
    getAccommodations();
    getDestinations();
});

</script>

<template>
    <section>
        <div class="container">
            <form>
                <h2>Create Trip</h2>
                <div class=" input-group mb-3">
                    <span class="input-group-text">Name</span>
                    <input type="text" class="form-control" id="name" v-model="trip.name">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Image URL</span>
                    <input type="text" class="form-control" id="image" v-model="trip.image_path" />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Description</span>
                    <textarea class="form-control" id="description" v-model="trip.description"></textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Departure Date</span>
                    <input type="date" class="form-control" id="departure_date" v-model="trip.departure_date" />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Duration</span>
                    <input type="number" min="0" class="form-control" id="duration" v-model="trip.duration" />
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text">Available</span>
                    <input type="checkbox" class="form-check-input" id="available" v-model="trip.available" />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Price</span>
                    <input type="number" min="0" class="form-control" id="price" v-model="trip.price" />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Category</span>
                    <select class="form-select" id="category" v-model="trip.category_id">
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                            {{ category.category_type }}
                        </option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Accommodation</span>
                    <select class="form-select" id="accommodation" v-model="trip.accommodation_id">
                        <option v-for="accommodation in accommodations" :key="accommodation.id" :value="accommodation.id">
                            {{ accommodation.hotel_name }} {{ accommodation.hotel_stars }}* , {{ accommodation.meal_type }}
                        </option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Destination</span>
                    <select class="form-select" id="destination" v-model="trip.destination_id">
                        <option v-for="destination in destinations" :key="destination.id" :value="destination.id">
                            {{ destination.name}}
                        </option>
                    </select>
                </div>
                <button @click="createTrip()" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
</template>