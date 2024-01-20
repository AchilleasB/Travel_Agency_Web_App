<script setup>
import { defineProps } from 'vue';

const props = defineProps(['type', 'image']);
console.log(props);
</script>

<template>
    <div class="card w-75 m-auto mt-5 mb-5">
        <img :src="image" class="image" alt="Image of a category">
        <p class="card-text">{{ type }}</p>
    </div>  
</template>

<style scoped>

.card {
    border: none;
}
.card-text {
    z-index: 1;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-weight: bold;
    font-size: 2rem;
    color: white;
    text-shadow: 2px 2px 4px #000000;
    pointer-events: none;
}

.image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(75%);
    transition: transform .4s ease-in-out;
    cursor: pointer;
    border-radius: 5%;
}

.image:hover {
    transform: scale(1.1);
    filter: brightness(90%);

}
</style>