<script setup>


const props = defineProps(['tripId', 'tripName', 'tripDepartureDate', 'tripDuration',
                            'tripHotelName', 'tripHotelStars', 'tripMealType']);
console.log(props.tripId);

</script>

<template>
    <div class="container">
        <div class="col-sm-6 col-md-8 text-center">
            <div class="row d-flex align-items-center">
                <div class="col">
                    <span class="item-data-label">Hotel:</span>
                </div>
                <div class="col">
                    <span class="item-data-label">Number of Days:</span>
                </div>
                <div class="col">
                    <span class="item-data-label">Services:</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-8 text-center">
            <div class="row d-flex align-items-center">
                <div class="col">
                    <span class="item-data-value">{{ tripHotelName }} {{ tripHotelStars }}*</span>
                </div>
                <div class="col">
                    <span class="item-data-value">{{ tripDuration }}</span>
                </div>
                <div class="col">
                    <span class="item-data-value">{{ tripMealType }}</span>
                </div>
            </div>
        </div>
    </div>
</template>


