<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { useUserStore } from '../stores/user';

const userStore = useUserStore();
const router = useRouter();
const visible = ref(false);


const logout = () => {
  userStore.logout();
  router.push({ name: 'home' });
}

// TODO: fix the navbar collapse
</script>
<template>
  <header class="text-center py-3 mb-4 ">
    <div class="mb-3">
      <router-link to="/" href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
        <img alt="Vue logo" src="@/assets/MakLogo.svg" class="w-100" />
      </router-link>
    </div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarNav" 
          @click="visible = !visible">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" :class="!visible ? 'collapse' : ''" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <router-link to="/" class="nav-link" @click="visible = !visible">HOME</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/about" class="nav-link" @click="visible = !visible">ABOUT US</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/destination" class="nav-link" @click="visible = !visible">DESTINATIONS</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/category" class="nav-link" @click="visible = !visible">CATEGORIES</router-link>
            </li>
          </ul>
          <div class="col-md-3 text-end">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li v-if="!userStore.isAuthenticated" class="nav-item">
                <router-link to="/account" class="nav-link" @click="visible = !visible"><i class="fa-solid fa-user"></i> My account</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/reservation" class="nav-link" @click="visible = !visible"><i class="fa-solid fa-cart-shopping"></i> Reservations</router-link>
              </li>
              <li v-if="userStore.isAuthenticated" class="nav-item">
                <router-link to="/profile" class="nav-link" @click="visible = !visible"><i class="fa-solid fa-user"></i> {{userStore.username}}</router-link>
              </li>
              <li v-if="userStore.isAuthenticated" class="nav-item">
                <button class="nav-link" @click="logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
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
  height: 12vh;
  background: linear-gradient(to right, #ffd633, #efc365, #f7c273);
  font-size: 1rem;
  display: flex;
  justify-content: space-between;
  padding: 0 20px;
  color: aliceblue;
}

@media (max-width: 767px) {
  /* .navbar {
    flex-direction: column;
    height: auto;
  }

  .navbar-nav {
    display: block;
    margin: 0;
    padding: 0;

  } */

}
</style>