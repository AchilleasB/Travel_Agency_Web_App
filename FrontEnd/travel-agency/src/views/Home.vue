<script setup>
import CreateTrip from '../components/trip/CreateTrip.vue';
</script>

<template>
  <main>
    <div class="container">
      <section class="hero">
        <div class="hero__text">
          <h1>Mak Travel</h1>
          <p>Your next journey is here</p>
          <CreateTrip/>
        </div>
      </section>
    </div>
  </main>
</template>

<style scoped>
.navbar {
  width: 100vw;
  height: 150px;
  background-color: rgb(137, 183, 201);
}
</style>

