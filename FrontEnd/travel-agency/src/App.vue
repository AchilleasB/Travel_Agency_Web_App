<script setup>
import { RouterView } from 'vue-router'
import Navigation from './components/Navigation.vue'
import Footer from './components/Footer.vue'
import { useUserStore } from './stores/user'
import { useRouter } from 'vue-router'
import { onMounted } from 'vue';

const userStore = useUserStore()
const router = useRouter()

onMounted(() => {
  userStore.autoLogin();
  
  if (!userStore.isAuthenticated) {
    router.push({ name: 'account' })
  }
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
  flex-direction: column;
}

.router-view-container {
  align-items: center;
}

.Footer {
  margin-top: auto;
}
</style>
