import { defineStore } from 'pinia';
import axios from '../axios-auth';

export const useReservationStore = defineStore('reservationStore', {
    state: () => ({
        id: 0,
        user_id: 0,
        trip_id: 0,
        num_of_travellers: 0,
        total_price: 0,
        status: '',
        reservations: [],
    }),

    actions: {

        async getReservations() {
            try {
                const response = await axios.get('reservations');
                this.reservations = response.data;
                // console.log(this.reservations);
                return response.data;
            } catch (error) {
                console.log(error);
                return error;
            }
        },

        async getUserReservations(user_id) {
            try {
                const response = await axios.get(`reservations/` + user_id);
                console.log(response);

                this.reservations = response.data;
                // console.log(this.reservations);
                return response.data;

            } catch (error) {
                console.log(error);
                return error;
            }
        },

        async getCustomerData(id) {
            try {
                const response = await axios.get(`users/` + id);
                // console.log(response);
                return response.data;
            } catch (error) {
                console.log(error);
                return error;
            }
        },

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

        async deleteReservation(reservation_id) {
            try {
                const response = await axios.delete(`reservations/` + reservation_id);
                console.log(response);
                return response;
            } catch (error) {
                console.log(error);
                return error;
            }
        },

        async approveReservation(reservation_id) {
            const response = await axios.put(`reservations/` + reservation_id);
            console.log(response);
            return response;

        },

        async getMostReservedTrips() {
            try {
                const response = await axios.get('reservations/mostReservedTrips');
                console.log(response);
                return response.data;
            } catch (error) {
                console.log(error);
                return error;
            }
        }
    }
});
