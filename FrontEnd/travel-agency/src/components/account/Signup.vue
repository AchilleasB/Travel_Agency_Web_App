<script setup>
import { ref } from 'vue';
import axios from '../../axios-auth';


const username = ref('');
const email = ref('');
const password = ref('');
const successMessage = ref('');
const errorMessage = ref('');

const signup = async () => {
    const response = await axios.post('users/signup', {
        username: username.value,
        email: email.value,
        password: password.value
    });
    console.log(response);

    if(response.data) {
        successMessage.value = `${response.data.username} has successfully signed up!`;
        errorMessage.value = '';
    }else {
        errorMessage.value = 'Something went wrong!';
        successMessage.value = '';
    }

    setTimeout(() => {
        successMessage.value = '';
        errorMessage.value = '';
        username.value = '';
        email.value = '';
        password.value = '';
    }, 3000);
}
</script>

<template>
    <div class="signup-container">
        <div class="container fluid mt-4">
            <h3 class="d-flex justify-content-center mb-5">Signup</h3>
            <div v-if="successMessage" class="alert alert-success">{{ successMessage }}</div>
            <div v-if="errorMessage" class="alert alert-danger">{{ errorMessage }}</div>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input v-model="username" type="text" class="form-control" id="inputName" name="username">
                </div>
                <div class="mb-3">
                    <label for="inputSignupEmail" class="form-label">Email address</label>
                    <input v-model="email" type="email" class="form-control" id="inputSignupEmail" name="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="inputSignupPassword" class="form-label">Password</label>
                    <input v-model="password" type="password" id="inputSignupPassword" name="password" class="form-control"
                        aria-describedby="passwordHelpBlock">
                    <div id="passwordHelpBlock" class="form-text">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not
                        contain spaces,
                        special
                        characters, or emoji.
                    </div>
                </div>
                <button @click.prevent="signup" type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>
</template>

<style scoped>
.signup-container {
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
