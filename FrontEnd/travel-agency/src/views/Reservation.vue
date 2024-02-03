<script setup>
import { ref, onMounted } from 'vue';
import axios from '../axios-auth';
import { useUserStore } from '../stores/user';

const userStore = useUserStore();
const user = userStore.username;

</script>

<template>
    <div class="container">
        <h1>Reservations</h1>
        <div v-if="!user">You need to log in</div>
        <div v-else>
        </div>
    </div>
</template>
