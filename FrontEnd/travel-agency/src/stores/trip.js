import { defineStore } from 'pinia';
import axios from '../axios-auth';

export const useTripStore = defineStore('tripStore', {
    state: () => ({
        id: 0,
        name: '',
        image_path: '',
        description: '',
        departure_date: new Date(),
        duration: 0,
        price: 0,
        available: false,
        accommodation_id: '',
        accommodation: {},
        category_id: '',
        category: {},
        destination_id: '',
        destination: {},
        topTrips: [],
    }),

    actions: {

        async getTrips() {
            try {
                const response = await axios.get('trips');
                return response.data;
            } catch (error) {
                console.log(error);
                return error;
            }
        },

        async getTripData(trip_id) {
            try {
                const response = await axios.get(`trips/` + trip_id);
                // console.log(response);

                if (response.data) {
                    this.id = response.data.id;
                    this.name = response.data.name;
                    this.image_path = response.data.image_path;
                    this.description = response.data.description;
                    this.departure_date = response.data.departure_date;
                    this.duration = response.data.duration;
                    this.price = response.data.price;
                    this.available = response.data.available;
                    this.accommodation_id = response.data.accommodation_id;
                    this.accommodation = response.data.accommodation;
                    this.category_id = response
                    this.category = response.data.category;
                    this.destination_id = response.data.destination_id;
                    this.destination = response.data.destination;
                }

                return response.data;

            } catch (error) {
                console.log(error);
                return error;
            }
        },

        async getTopTrips(mostSelectedTrips) {
            try {
                for (const element of mostSelectedTrips) {
                    const trips = await this.getTripData(element.trip_id);
                    this.topTrips.push(trips);
                }
            } catch (error) {
                console.log(error);
                return error;
            }
        },

    }
});