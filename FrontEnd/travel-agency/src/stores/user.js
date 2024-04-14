import { defineStore } from 'pinia';
import axios from '../axios-auth';

export const useUserStore = defineStore('userStore', {
    state: () => ({
        jwt: '',
        id: 0,
        username: '',
        email: '',
        role: '',
    }),

    getters: {
        isAuthenticated: (state) => state.jwt !== '',
        isAdmin: (state) => state.role === 'admin',
    },

    actions: {

        async login(email, password) {
            try {
                const response = await axios.post('users/login', {
                    email: email,
                    password: password
                });
                console.log(response);

                this.jwt = response.data.jwt;
                this.id = response.data.user_id;
                this.username = response.data.username;
                this.email = response.data.email;
                this.role = response.data.role;

                localStorage.setItem('jwt', this.jwt);
                localStorage.setItem('user_id', this.id);
                localStorage.setItem('username', this.username);
                localStorage.setItem('email', this.email);
                localStorage.setItem('role', this.role);

                axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.jwt;

                console.log(this.jwt, this.id);

                return response;
            } catch (error) {
                console.log(error);
                return error;
            }
        },

        autoLogin() {
            const jwt = localStorage.getItem('jwt');
            const id = localStorage.getItem('user_id');
            const username = localStorage.getItem('username');
            const email = localStorage.getItem('email');
            const role = localStorage.getItem('role');

            console.log(jwt, id);

            if (jwt && id) {
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + jwt;
                this.jwt = jwt;
                this.id = id;
                this.username = username;
                this.email = email;
                this.role = role;

                return true;
            }

            return false;

        },

        async signup(email, password, username) {
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
        },

        logout() {
            this.jwt = '';
            this.id = '';
            this.username = '';
            this.email = '';
            localStorage.removeItem('jwt');
            localStorage.removeItem('user_id');
            axios.defaults.headers.common['Authorization'] = '';
        },

        async update(username, email, password) {
            const response = await axios.put(`/users/update`, {
                username: username,
                email: email,
                password: password,
            });
            console.log(response);

            return response;
        },

    }

});


