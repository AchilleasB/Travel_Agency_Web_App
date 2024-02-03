<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { useUserStore } from '../../stores/user';

const userStore = useUserStore();

const router = useRouter();

const email = ref('');
const password = ref('');
const successMessage = ref('');
const errorMessage = ref('');

const login = async () => {
    const res = await userStore.login(email.value, password.value);

    if (userStore.jwt) {
        successMessage.value = `${userStore.username} has successfully logged in!`;
        errorMessage.value = '';

        setTimeout(() => {
            router.push({ name: 'home' });
        }, 2000);
    } else {
        errorMessage.value = res.response.data.errorMessage;
        successMessage.value = '';

        setTimeout(() => {
            successMessage.value = '';
            errorMessage.value = '';
            email.value = '';
            password.value = '';
        }, 2000);
    }
}

</script>

<template>
    <div class="login-container">
        <div class="container fluid mt-4 ">
            <h3 class="d-flex justify-content-center mb-5">Log in</h3>
            <div v-if="successMessage" class="alert alert-success">{{ successMessage }}</div>
            <div v-if="errorMessage" class="alert alert-danger">{{ errorMessage }}</div>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="inputLoginEmail" class="form-label">Email</label>
                    <input name="email" type="email" v-model="email" class="form-control" id="inputLoginEmail">
                </div>
                <div class="mb-3">
                    <label for="inputLoginPassword" class="form-label">Password</label>
                    <input name="password" type="password" v-model="password" class="form-control" id="inputLoginPassword"
                        aria-describedby="passwordHelpBlock">
                    <div id="passwordHelpBlock" class="form-text">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not
                        contain spaces,
                        special characters, or emoji.
                    </div>
                </div>
                <button @click.prevent="login" type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>
</template>

<style scoped>
.login-container {
    height: 100%;
    border: 1px solid black;
    border-radius: 5px;
    padding: 10px;
    background: rgb(247, 247, 247);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h3 {
    color: #3f51b5;
}

input {
    border: 1px solid #ccc;
    border-radius: 3px;
    padding: 8px;
}

.btn-primary {
    background-color: #3f51b5;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #2e89fe;
}

.container {
    max-width: 400px;
    margin: 0 auto;
}
</style>
