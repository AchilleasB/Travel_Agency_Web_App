<script setup>
import { ref } from 'vue';
import { useUserStore } from '../stores/user';

const userStore = useUserStore();
const password = ref('');

const successMessage = ref('');
const errorMessage = ref('');

const update = async () => {
    try {
        const res = await userStore.update(userStore.username, userStore.email, password.value);

        if(res.success){
            successMessage.value = `${userStore.username} has been updated successfully!`;
        }
        else{
            errorMessage.value = `Failed to update ${userStore.username}`;
        }
    } catch (error) {
        console.log(error);
    }
}

</script>

<template>
    <form class="row g-4">
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
            <button @click="update" type="submit" class="btn btn-primary w-100">Update</button>
        </div>
    </form>
    <div v-if="successMessage" class="alert alert-success">{{ successMessage }}</div>
    <div v-if="errorMessage" class="alert alert-danger">{{ errorMessage }}</div>
</template>