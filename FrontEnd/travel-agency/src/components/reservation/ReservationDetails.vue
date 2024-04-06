<script setup>


const props = defineProps(['tripId','tripName','tripDepartureDate','tripDuration','tripHotelName','tripHotelStars','tripMealType']); 
console.log(props.tripId);

</script>

<template>
<div class="col-sm-6 col-md-8 text-center">
            <div class="row d-flex align-items-center">
                <div class="col">
                    <span class="item-data-value">{{ tripName }}</span>
                </div>
                <div class="col">
                    <span class="item-data-value">{{ tripDepartureDate }}</span>
                </div>
                <div class="col">
                    <span class="item-data-value">{{ tripDuration }}</span>
                </div>
                <div class="col">
                    <span class="item-data-value">{{ tripHotelName }}</span>
                </div>
                <div class="col">
                    <span class="item-data-value">{{ tripHotelStars }}</span>
                </div>
                <div class="col">
                    <span class="item-data-value">{{ tripMealType }}</span>
                </div>
            </div>
        </div>
</template>
