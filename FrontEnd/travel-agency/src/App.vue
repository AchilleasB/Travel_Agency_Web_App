<script setup>
import { RouterView } from 'vue-router'
import Navigation from './components/Navigation.vue'
import Footer from './components/Footer.vue'
</script>

<template>
  <div class="app-container">
    <Navigation />
    <div class="router-view-container">
      <RouterView />
    </div>
    <Footer />
  </div>
</template>

<style scoped>
.app-container {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

.router-view-container {
  flex-grow: 1;
  max-width: 1200px;
  margin: 0 auto;
  align-items: center;
}
</style>
