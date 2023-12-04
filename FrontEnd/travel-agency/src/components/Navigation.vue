<script setup>
</script>

<template>
  <div class="logo">
    <img alt="Vue logo" src="@/assets/logo.svg" width="125" height="125" />
  </div>
  <div class="wrapper">
    <nav>
      <router-link to="/">Home</router-link>
      <router-link to="/about">About us</router-link>
      <router-link to="/destinations">Destinations</router-link>
    </nav>
  </div>
</template>


<style scoped>
.wrapper {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  height: 100%;
  padding: 0 2rem;
}
</style>