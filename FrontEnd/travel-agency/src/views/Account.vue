<script setup>
import Login from '../components/account/Login.vue';
import Signup from '../components/account/Signup.vue';
import { ref, onMounted } from 'vue';
import axios from '../axios-auth';

</script>

<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="d-flex justify-content-center">Login</h3>
                <Login />
            </div>
            <div class="col-md-6">
                <h3 class="d-flex justify-content-center">Signup</h3>
                <Signup />
            </div>
        </div>
    </div> 
</template>