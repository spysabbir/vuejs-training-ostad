<template>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Photo Gallery</h1>

    <div class="flex justify-center space-x-4 mb-6">
        <button v-for="category in categories" :key="category" @click="filterPhotos(category)" :class="{ 'bg-blue-500 text-white': activeCategory === category, 'bg-gray-200': activeCategory !== category }" class="px-4 py-2 rounded-md focus:outline-none">
            {{ category }}
        </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <div v-for="photo in filteredPhotos" :key="photo.id" @click="openModal(photo)" class="relative cursor-pointer">
            <img :src="photo.url" :alt="photo.title" class="w-full h-64 object-cover rounded-md">
            <div class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50 rounded-md">
                <p class="text-white text-lg font-bold">{{ photo.title }}</p>
            </div>
        </div>
    </div>

    <div v-if="selectedPhoto" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="absolute inset-0 bg-black bg-opacity-75"></div>
        <div class="bg-white p-8 rounded-lg z-10 relative">
            <button @click="closeModal" class="absolute top-4 right-4 text-red-600 hover:text-pink-800 focus:outline-none">
                <svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <button @click="prevPhoto" class="absolute top-1/2 left-4 transform -translate-y-1/2 text-blue-600 hover:text-indigo-800 focus:outline-none">
                <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button @click="nextPhoto" class="absolute top-1/2 right-4 transform -translate-y-1/2 text-indigo-600 hover:text-blue-800 focus:outline-none">
                <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
            <img :src="selectedPhoto.url" :alt="selectedPhoto.title" class="max-w-full h-auto">
            <p class="mt-4 text-lg font-bold">{{ selectedPhoto.title }}</p>
        </div>
    </div>
</div>
</template>

<script setup>
import { ref } from 'vue';

const photos = ref([
    { id: 1, title: 'Mountain View', category: 'Nature', url: 'https://source.unsplash.com/600x400/?mountain' },
    { id: 2, title: 'Cityscape', category: 'City', url: 'https://source.unsplash.com/600x400/?city' },
    { id: 3, title: 'Beach Sunset', category: 'Nature', url: 'https://source.unsplash.com/600x400/?beach' },
    { id: 4, title: 'Urban Architecture', category: 'City', url: 'https://source.unsplash.com/600x400/?architecture' },
    { id: 5, title: 'Forest', category: 'Nature', url: 'https://source.unsplash.com/600x400/?forest' },
    { id: 6, title: 'Downtown', category: 'City', url: 'https://source.unsplash.com/600x400/?downtown' },
    { id: 7, title: 'Mountain Lake', category: 'Nature', url: 'https://source.unsplash.com/600x400/?lake' },
    { id: 8, title: 'City Park', category: 'City', url: 'https://source.unsplash.com/600x400/?park' },
    { id: 9, title: 'Desert', category: 'Nature', url: 'https://source.unsplash.com/600x400/?desert' },
    { id: 10, title: 'City Street', category: 'City', url: 'https://source.unsplash.com/600x400/?street' },
    { id: 11, title: 'Mountain Peak', category: 'Nature', url: 'https://source.unsplash.com/600x400/?peak' },
    { id: 12, title: 'City Bridge', category: 'City', url: 'https://source.unsplash.com/600x400/?bridge' },
    { id: 13, title: 'Waterfall', category: 'Nature', url: 'https://source.unsplash.com/600x400/?waterfall' },
    { id: 14, title: 'City Skyline', category: 'City', url: 'https://source.unsplash.com/600x400/?skyline' },
    { id: 15, title: 'Countryside', category: 'Nature', url: 'https://source.unsplash.com/600x400/?countryside' },
    { id: 16, title: 'City Square', category: 'City', url: 'https://source.unsplash.com/600x400/?square' },
]);

const categories = ref(['All', ...new Set(photos.value.map(photo => photo.category))]);
const activeCategory = ref('All');
const filteredPhotos = ref(photos.value);
const selectedPhoto = ref(null);
const selectedIndex = ref(-1);

const filterPhotos = (category) => {
    activeCategory.value = category;
    if (category === 'All') {
        filteredPhotos.value = photos.value;
    } else {
        filteredPhotos.value = photos.value.filter(photo => photo.category === category);
    }
};

const openModal = (photo) => {
    selectedPhoto.value = photo;
    selectedIndex.value = filteredPhotos.value.findIndex(p => p.id === photo.id);
};

const closeModal = () => {
    selectedPhoto.value = null;
};

const prevPhoto = () => {
    if (selectedIndex.value > 0) {
        selectedIndex.value--;
        selectedPhoto.value = filteredPhotos.value[selectedIndex.value];
    }
};

const nextPhoto = () => {
    if (selectedIndex.value < filteredPhotos.value.length - 1) {
        selectedIndex.value++;
        selectedPhoto.value = filteredPhotos.value[selectedIndex.value];
    }
};
</script>

<style scoped>

</style>