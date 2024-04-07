<script setup>
import { RouterView } from 'vue-router'
import Navigation from './components/Navigation.vue'
import Footer from './components/Footer.vue'
import { useUserStore } from './stores/user'
import { onMounted } from 'vue';

const userStore = useUserStore()

onMounted(() => {
  userStore.autoLogin()
})

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
  flex-wrap: wrap;
}

.router-view-container {
  flex-grow: 1;
  margin: 0 auto;
  align-items: center;
}
</style>
