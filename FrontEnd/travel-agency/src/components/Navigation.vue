<script setup>
</script>

<template>
  <header class="text-center py-3 mb-4 ">
    <div class="mb-3">
      <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
        <img alt="Vue logo" src="@/assets/MakLogo.svg" class="w-100" />
      </a>
    </div>
    <nav class="navbar navbar-expand-md navbar-#e9c557 bg-#e9c557">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
          aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li><router-link to="/" class="nav-link px-2 ">Home</router-link></li>
            <li><router-link to="/about" class="nav-link px-2">About us</router-link></li>
            <li><router-link to="/destination" class="nav-link px-2">Destinations</router-link></li>
            <li><router-link to="/category" class="nav-link px-2">Categories</router-link></li>
          </ul>
          <div class="col-md-3 text-end">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li><router-link to="/account" class="nav-link px-2 ">My account</router-link></li>
            <li><router-link to="/reservation" class="nav-link px-2">Reservations</router-link></li>
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
  display: flex;
  justify-content: space-between;
  align-items: stretch;
  padding: 0 20px;
}

.nav-link {
  color: #000000;
}

.container-fluid {
  max-width: 1200px;
  margin: auto;
}

.row {
  justify-content: space-between;
  align-items: center;
}

@media (max-width: 680px) {
  
}
</style>