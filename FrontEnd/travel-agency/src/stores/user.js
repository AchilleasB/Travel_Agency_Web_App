import { defineStore } from 'pinia';
import axios from '../axios-auth';

export const useUserStore = defineStore('userStore', {
    state: () => ({
        jwt: '',
        id: '',
        username: '',
        email: '',
    }),

    getters: {
        isAuthenticated: (state) => state.jwt !== ''
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

                localStorage.setItem('jwt', response.data.jwt);
                localStorage.setItem('user_id', response.data.user_id);
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + response.data.jwt;
                

                return response;
            } catch (error) {
                console.log(error);
                return error;
            }
        },

        autoLogin() {
            const jwt = localStorage.getItem('jwt');
            const id = localStorage.getItem('user_id');

            if (jwt) {
                this.jwt = jwt;
                this.id = id;
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + jwt;
                this.fetchUserData();
            }
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
            localStorage.removeItem('jwt');
            localStorage.removeItem('user_id');
            axios.defaults.headers.common['Authorization'] = '';
        },

        async update(username, email, password) {
            try {
                const response = await axios.put(`/users/update`, {
                    username: username,
                    email: email,
                    password: password,
                });
                console.log(response);

                if (response.status === 200) {
                    this.username = response.data.username;
                    return { success: true };
                }else{
                    return { success: false};
                }
            } catch (error) {
                console.log(error);
                return error;
            }
        },

        async fetchUserData() {
            try {
                const response = await axios.get(`/users/${this.id}`);
                console.log(response);

                if (response.data) {
                    this.username = response.data.username;
                    this.email = response.data.email;

                    return response;
                }
            } catch (error) {
                console.log(error);
                return error;
            }
        },
    }

});


