import axios from 'axios'

const instance = axios.create({
    // must be changed before deployment
    baseURL: 'https://localhost/'
});

export default instance;

// wherever I want to do authantication requests 
// I can import this file and use it as a normal axios instance
// eg. import axios from './axios-auth'