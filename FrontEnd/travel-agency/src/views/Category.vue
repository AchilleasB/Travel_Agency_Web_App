<script setup>
import Navigation from '../components/Navigation.vue'
import CategoryCard from '../components/CategoryCard.vue';
import { ref, onMounted } from 'vue';
import axios from '../axios-auth';
import { useRouter } from 'vue-router';

const router = useRouter();
const categories = ref([]);

const getCategories = async () => {
    const response = await axios.get('categories');
    categories.value = response.data;
};

const navigateToTrips = (categoryId) => {
    router.push({ name: 'category-trips', params: { id: categoryId } });
    console.log(categoryId);
};

onMounted(() => {
    getCategories();
});

</script>

<template>
    <Navigation />
    <div class="container">
        <h3 class="d-flex justify-content-center">Travel solo or with company</h3>
        <div v-if="categories.length > 0">
            <CategoryCard 
                v-for="category in categories" 
                    :key="category.id"
                    :categoryId="category.id" 
                    :type="category.category_type" 
                    :image="category.image_path"
                    @click="navigateToTrips(category.id)"/>
        </div>
    </div>
</template>