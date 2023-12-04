<script setup>
import { Navigation } from '@/components/Navigation.vue'
</script>

<template>
  <div class="navbar">
    <navigation></navigation>
  </div>
  <main>
    <section class="hero">
      <div class="hero__text">
        <h1>Mak Travel</h1>
        <p>Your next journey is here</p>
      </div>
    </section>

  </main>
</template>

<style scoped>

.navbar {
  width: 100vw;
  height: 150px;
  background-color: rgb(137, 183, 201);
}


</style>

