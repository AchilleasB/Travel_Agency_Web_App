<script setup>

const props = defineProps(['destinationName', 'image', 'description']);
console.log(props);

</script>

<template>
        <div class="destination-card w-75 m-auto mt-5 mb-5">
            <img :src="image" class="image" alt="Image of a destination">
            <div class="card-body">
                <h5 class="card-title">{{ destinationName }}</h5>
                <p class="card-text">{{ description }}</p>
            </div>
        </div>
</template>


<style scoped>
.destination-card {
    border: 1px solid #ddd;
    border-radius: 3%;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
}

.destination-card:hover {
    transform: scale(1.05);
    filter: brightness(100%);
}

.destination-card:hover .image{
    filter: brightness(90%);
}

.image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(80%);
    transition: transform .4s ease-in-out;
}

.card-body {
    padding: 1.5rem;
}

.card-title {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    color: #333;
}

.card-text {
    color: #555555;
    letter-spacing: .1em;
    line-height: 1.6;
    font-weight: 500;
}

a {
  text-decoration: none;
}
</style>