<script setup>
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';
import { useTripStore } from '../stores/trip';
import { useReservationStore } from '../stores/reservation';
import TripCarousel from '../components/Carousel.vue';
import axios from '../axios-auth';

const tripStore = useTripStore();
const reservationStore = useReservationStore();
const router = useRouter();

const topFiveTrips = ref([]);
const allDestinations = ref([]);

const getDestinations = async () => {
  const response = await axios.get('destinations');
  allDestinations.value = response.data;

  console.log(allDestinations.value);
};

onMounted(async () => {
  try {
    const mostReservedTrips = await reservationStore.getMostReservedTrips();
    await tripStore.getTopTrips(mostReservedTrips);
    topFiveTrips.value = tripStore.topTrips.slice(0, 5);
    console.log(topFiveTrips.value);

    getDestinations();
  } catch (error) {

  }

});

</script>

<template>
  <main>
    <div class="container">
      <section class="trips">
        <div class="trips_text">
          <h2>Top 5 Trips</h2>
          <p><em>Most choosen trips by our travellers</em></p>
        </div>
        <div class="trips-carousel">
          <TripCarousel :items="topFiveTrips" />
        </div>
      </section>
      <section class="destinations">
        <div class="destinations_text">
          <h2>All Continents</h2>
          <p><em>Travel to any continent</em></p>
        </div>
        <div class="destinations-carousel">
          <TripCarousel :items="allDestinations" />
        </div>
      </section>
    </div>
  </main>
</template>

<style scoped>

.container {
  margin-top: 2em;
}

.trips,
.destinations {
  margin-bottom: 4em;
  padding: 3em;
  border-radius: .3em;
}

.trips {
  background-image: url('@/assets/travel-world.jpg');
}

.destinations {
  background-image: url('@/assets/travel-hero.jpg');
}

.trips_text,
.destinations_text {
  text-align: center;
  color: white;
  background-color: rgba(0, 0, 0, 0.5);
  width:fit-content;
  margin: .5em auto;
  padding: .5em 2em;
}

.trips-carousel {
  width: 75%;
  margin: 0 auto;
}

.destinations-carousel {
  width: 75%;
  margin: 0 auto;
}
</style>
