<template>
<div class="flex justify-center items-center mt-5 p-3 bg-gray-100">
    <div class="bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">URL Shortener</h1>
        <div class="flex mb-4">
            <input v-model="longUrl" type="text" placeholder="Enter URL" class="flex-1 border border-gray-300 px-3 py-2 rounded-l-md focus:outline-none focus:ring focus:ring-blue-200">
            <button @click="shortenUrl" class="py-2 px-4 bg-blue-500 text-white rounded-r-md focus:outline-none">Shorten</button>
        </div>
        <div v-if="shortenedUrl" class="mb-4">
            <p class="text-lg font-semibold">Shortened URL:</p>
            <div class="flex items-center justify-between">
                <a :href="shortenedUrl" target="_blank" class="text-blue-500 mr-2">{{ shortenedUrl }}</a>
                <button @click="copyToClipboard" class="py-2 px-4 bg-indigo-500 text-white rounded-md focus:outline-none">Copy</button>
            </div>
        </div>
        <div v-if="error" class="text-red-500 mb-4">{{ error }}</div>
    </div>
</div>
</template>

<script setup>
import { ref } from 'vue';

const longUrl = ref('');
const shortenedUrl = ref('');
const error = ref('');

const shortenUrl = async () => {
if (!longUrl.value) {
    error.value = 'Please enter a URL';
    return;
}

try {
    const response = await fetch('https://api-ssl.bitly.com/v4/shorten', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': '247b66128a28ce6d259e0b0a67f7ef5737453c0e'
        },
        body: JSON.stringify({ long_url: longUrl.value })
    });

    if (!response.ok) {
        throw new Error('Failed to shorten URL');
    }

    const data = await response.json();
    shortenedUrl.value = data.link;
    error.value = '';
} catch (err) {
    console.error(err);
    error.value = 'An error occurred while shortening the URL';
}
};

const copyToClipboard = () => {
    const el = document.createElement('textarea');
    el.value = shortenedUrl.value;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
};
</script>