<template>
<div class="flex justify-center items-center mt-5 p-3 bg-gray-100">
    <div class="bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Currency Converter</h1>
        <div class="my-4 text-center bg-gray-400" v-if="result">
            <p class="text-lg font-semibold">Result: {{ result }}</p>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="fromCurrency" class="block mb-2 text-sm font-medium text-gray-700">From:</label>
                <select v-model="fromCurrency" id="fromCurrency" class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                    <option v-for="currency in currencies" :key="currency" :value="currency">{{ currency }}</option>
                </select>
            </div>
            <div>
                <label for="toCurrency" class="block mb-2 text-sm font-medium text-gray-700">To:</label>
                <select v-model="toCurrency" id="toCurrency" class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                    <option v-for="currency in currencies" :key="currency" :value="currency">{{ currency }}</option>
                </select>
            </div>
        </div>
        <div class="mt-4">
            <label for="amount" class="block mb-2 text-sm font-medium text-gray-700">Amount:</label>
            <input type="number" v-model="amount" id="amount" class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
        </div>
        <div class="mt-4">
            <button @click="convert" class="w-full py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">Convert</button>
        </div>
    </div>
</div>
</template>
<script setup>
import { ref } from 'vue';
import showAlert from '../helpers/alert';

const currencies = ref(['USD', 'EUR', 'BDT', 'INR']);
const fromCurrency = ref('USD');
const toCurrency = ref('BDT');
const amount = ref(0);
const result = ref(null);

const convert = () => {
    if (amount.value <= 0) {
        showAlert('error', 'Amount must be greater than 0');
        return;
    }

    const conversionRates = {
        'USD': { 'EUR': 0.92, 'BDT': 117.09, 'INR': 83.30 },
        'EUR': { 'USD': 1.09, 'BDT': 127.58, 'INR': 90.76 },
        'BDT': { 'USD': 0.0085, 'EUR': 0.0078, 'INR': 0.71 },
        'INR': { 'USD': 0.012, 'EUR': 0.011, 'BDT': 1.41 }
    };

    if (fromCurrency.value === toCurrency.value) {
        result.value = amount.value;
    } else {
        result.value = (amount.value * conversionRates[fromCurrency.value][toCurrency.value]).toFixed(2);
    }
};
</script>

<style scoped>

</style>