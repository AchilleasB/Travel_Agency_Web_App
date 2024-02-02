import { ref } from 'vue'
import { defineStore } from 'pinia'
import axios from '../axios-auth';

export const useUserStore = defineStore('user', () => {
    const username = ref('')

    async function login(email, password) {
        try {
            const response = await axios.post('users/login', {
                email: email,
                password: password
            });
            console.log(response);

            if (response.data) {
                localStorage.setItem('jwt', response.data.jwt);
                localStorage.setItem('user_id', response.data.user_id);
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + response.data.jwt;
                username.value = response.data.username;

                return response;
            }
        } catch (error) {
            console.log(error);
            return error;
        }
    }

    async function signup(email, password, username) {
        try {
            const response = await axios.post('users/signup', {
                email: email,
                password: password,
                username: username
            });
            console.log(response);

            return response;
        } catch (error) {
            console.log(error);
            return error;
        }
    }


    const logout = () => {
        localStorage.removeItem('jwt');
        localStorage.removeItem('user_id');
        axios.defaults.headers.common['Authorization'] = '';
        username.value = '';
    }

    return { username, login, signup, logout }
})