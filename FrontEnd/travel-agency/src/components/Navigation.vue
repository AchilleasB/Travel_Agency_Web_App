<script setup>
import { ref } from 'vue';

const visible = ref(false);
</script>

<template>
  <header class="text-center py-3 mb-4 ">
    <div class="mb-3">
      <router-link to="/" href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
        <img alt="Vue logo" src="@/assets/MakLogo.svg" class="w-100" />
      </router-link>
    </div>
    <nav class="navbar navbar-expand-md navbar-#e9c557 bg-#e9c557">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" 
                data-bs-toggle="collapse"
                data-bs-target="#navbarsExample03"
                @click="visible=!visible">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse" :class="!visible?'collapse':''" id="navbarsExample03">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <router-link to="/" class="nav-link" @click="visible=!visible">Home</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/about" class="nav-link" @click="visible=!visible">About us</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/destination" class="nav-link" @click="visible=!visible">Destinations</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/category" class="nav-link" @click="visible=!visible">Categories</router-link>
            </li>
          </ul>
          <div class="col-md-3 text-end">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <router-link to="/account" class="nav-link" @click="visible=!visible">My account</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/reservation" class="nav-link" @click="visible=!visible">Reservations</router-link>
            </li>
          </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<style scoped>
.navbar {
  width: 100vw;
  height: 8vh;
  background: #ffbf00ac;
  font-size: large;
  display: flex;
  justify-content: space-between;
  /* align-items: stretch; */
  padding: 0 20px;
}

@media (max-width: 680px) {
  
}
</style>