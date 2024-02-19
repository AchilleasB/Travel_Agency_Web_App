import { defineStore } from 'pinia';
import axios from '../axios-auth';

export const useReservationStore = defineStore('reservationStore', {
    state: () => ({
        user_id: 0,
        trip_id: 0,
        num_of_travellers: 0,
        total_price: 0,
        status: ''
    }),

    actions: {

        async reserve() {
            try {
                const response = await axios.post('reservations', {
                    user_id: this.user_id,
                    trip_id: this.trip_id,
                    num_of_travellers: this.num_of_travellers,
                    total_price: this.total_price,
                    status: ''
                });
                console.log(response);
                return response;
            } catch (error) {
                console.log(error);
                return error;
            }
        }
    }
});
