<script setup>
</script>

<template>
  <header class="d-flex align-items-center justify-content-center justify-content-md-between py-3 mb-4 ">
    <div class="col-md-3 mb-2 mb-md-0">
      <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
        <img alt="Vue logo" src="@/assets/logo.svg" width="125" height="125" />
      </a>
    </div>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li> <router-link to="/" class="nav-link px-2 link-secondary">Home</router-link></li>
      <li> <router-link to="/about" class="nav-link px-2">About us</router-link></li>
      <li> <router-link to="/destinations" class="nav-link px-2">Destinations</router-link></li>
    </ul>

    <div class="col-md-3 text-end">
      <button type="button" class="btn btn-outline-primary me-2">Login</button>
      <button type="button" class="btn btn-primary">Sign-up</button>
    </div>
  </header>
</template>


<style scoped>

header {
  width : 100vw;
  background-color: rgb(137, 183, 201);
  margin-bottom: 2rem;
  /* padding: 0.5rem 1rem; */
}

</style>