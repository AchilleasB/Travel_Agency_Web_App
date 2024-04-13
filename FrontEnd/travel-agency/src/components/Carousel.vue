<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();
const props = defineProps(['items']);

const navigateToTrips = (item) => {
  if(item.available){
      router.push({ name: 'destination-trips', params: { id: item.destination_id } });
  }
  else{
      router.push({ name: 'destination-trips', params: { id: item.id } });
  }
}

</script>

<template>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div v-for="(item, index) in props.items" :key="index"
                :class="{ 'carousel-item': true, 'active': index === 0 }" :data-bs-interval="3000" @click="navigateToTrips(item)">
                <img :src="item.image_path" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>{{ item.name }}</h1>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.carousel-inner img {
    object-fit: cover;
    height: 40vh;
    width: 30vh;
    border-radius: .6em;
}

.carousel-inner img:hover {
    cursor: pointer;
}

.carousel-caption {
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border-radius: .5em;
    width: fit-content;
    margin: 0 auto;
    padding: 0 2em;
}
</style>