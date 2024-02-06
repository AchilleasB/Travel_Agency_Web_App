<script setup>
import { ref } from 'vue';
import { useUserStore } from '../stores/user';
import { set } from 'date-fns';

const userStore = useUserStore();
const password = ref('');
const successMessage = ref('');

const update = async () => {
    const res = await userStore.update(userStore.username, userStore.email, password.value);

    if (res.status === 200) {
        successMessage.value = 'Your credentials have been updated!';
        setTimeout(() => {
            successMessage.value = '';
        }, 2000);
    }
}

</script>

<template>
    <div class="container">
        <form class="row g-4 mt-3">
            <div class="col-md-3">
                <label for="inputUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputUsername" v-model="userStore.username">
            </div>
            <div class="col-md-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="text" class="form-control" id="inputEmail" v-model="userStore.email" disabled>
            </div>
            <div class="col-6">
                <label for="inputPassword" class="form-label">New password</label>
                <input type="text" class="form-control" id="inputPassword" v-model="password">
            </div>
            <div class="col-12">
                <button @click.prevent="update" type="submit" class="btn btn-primary w-50 mx-auto">Update</button>
            </div>
        </form>
        <div class="alert alert-success mt-3">{{ successMessage }}</div>
        <p>* You can update your credentials here</p><br />
        <div class="background-image"></div>
    </div>
        
        
</template>

<style scoped>

.container {
    position: relative;
    justify-content: center;
    align-items: center;
    display: flex;
    flex-direction: column;
    height: 50vh;
    width: 80vw;
}

p {
    position: absolute;
    bottom: 0;
    margin: 10px 0 0 10px;
}
 
button {
    margin: auto;
    display: flex;
    justify-content: center;
}

.background-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('@/assets/ProfileBackground.jpg');
    background-size: cover;
    background-position: center;
    z-index: -1;
    opacity: 0.4;
    border-radius: 10px;
    box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.5);
}
.form-label {
    font-weight: bold;
}
</style>