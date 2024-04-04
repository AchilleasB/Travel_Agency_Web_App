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
        },
        
        async getReservations() {
            try {
                const response = await axios.get('reservations');
                return response;
            } catch (error) {
                console.log(error);
                return error;
            }
        },
        
        async fetchReservationData(user_id) {
            try {
                const response = await axios.get(`/reservations/`+ user_id);
                console.log(response);

                if (response.data) {
                    this.user_id = response.data.user_id;
                    this.trip_id = response.data.trip_id;
                    this.num_of_travellers = response.data.num_of_travellers;
                    this.total_price = response.data.total_price;
                    this.status = response.data.status;

                    return response;
                }
            } catch (error) {
                console.log(error);
                return error;
            }
        },

        async deleteReservation(reservation_id) {
            try {
                const response = await axios.delete(`/reservations/`+ reservation_id);
                console.log(response);
                return response;
            } catch (error) {
                console.log(error);
                return error;
            }
        }
    }
});
