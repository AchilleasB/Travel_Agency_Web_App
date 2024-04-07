<script setup>
import { ref, computed } from 'vue';
import { useUserStore } from '../../stores/user';
import { useReservationStore } from '../../stores/reservation';

const userStore = useUserStore();
const reservationStore = useReservationStore();
const props = defineProps(['tripId', 'name', 'departureDate', 'duration', 'price']);

const userIdFromLocalStorage = localStorage.getItem('user_id');
console.log(userIdFromLocalStorage);

reservationStore.user_id = parseInt(userIdFromLocalStorage);
reservationStore.num_of_travellers = 1;
reservationStore.trip_id = props.tripId;
reservationStore.total_price = computed(() => {
    return reservationStore.num_of_travellers * props.price;
});

const successMessage = ref('');

const confirmReservation = async () => {
    const res = await reservationStore.reserve();

    if (res.status === 200) {
        successMessage.value = 'Your reservation has been registered! We will contact you via email for further details.';
        setTimeout(() => {
            successMessage.value = '';
        }, 3000);
    }

}

</script>

<template>
  <div class="reservation-form">
    <div class="container">
      <h5>Fill out and send the interest form to contact you in more detail about this trip.</h5>
    </div>
    <form>
      <label for="user-name">Your Name:</label>
      <input v-model="userStore.username" type="text" id="user-name" disabled style="text-align: center;">

      <label for="user-name">Destination</label>
      <input v-model="props.name" type="text" id="user-name" disabled style="text-align: center;">
      
      <label for="user-name">Departure date:</label>
      <input v-model="props.departureDate" type="text" id="user-name" disabled style="text-align: center;">

      <label for="numb-of-travellers">Number of Travellers:</label>
      <input v-model="reservationStore.num_of_travellers" type="number" id="num-of-travellers" min="1" required style="text-align: center;">

      <label for="total-price">Total Price:</label>
      <p>{{ reservationStore.total_price }} €</p>

      <button @click.prevent="confirmReservation" type="submit">Confirm Reservation</button>
    </form>
    <div v-if="successMessage" class="alert alert-success mt-3">{{ successMessage }}</div>
  </div>
</template>

<style scoped>
.reservation-form {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    border-top: 2px solid #3e66f3; 
    text-align: center; 
}

.container {
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    margin-bottom: 5px;
}

input,
button {
    margin-bottom: 20px;
    padding: 10px;
    width: 75%;
}

button {
    background-color: #3e66f3;
    color: #fff;
    border: none;
}

.alert {
    text-align: center;
}
</style>