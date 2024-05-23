<template>
<div class="flex justify-center items-center mt-5 p-3 bg-gray-100">
    <div class="bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-2">BMI Calculator</h1>
        <div class="flex flex-col space-y-4">
            <div v-if="bmi !== null" class="my-4 bg-slate-400 p-1 rounded text-center">
                <h2 class="text-xl font-semibold">Your BMI: <span class="text-2xl font-bold">{{ bmi.toFixed(2) }}</span></h2>
                <p class="text-xl text-indigo-800 mt-1">{{ getBMIClassification(bmi) }}</p>
            </div>
            <div class="flex flex-col">
                <label for="height" class="font-semibold">Height:</label>
                <div class="flex items-center space-x-2">
                    <input v-model="heightFeet" type="number" id="heightFeet" placeholder="Feet" class="border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                    <input v-model="heightInches" type="number" id="heightInches" placeholder="Inches" class="border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                </div>
            </div>
            <div class="flex flex-col">
                <label for="weight" class="font-semibold">Weight (kg):</label>
                <input v-model="weight" type="number" id="weight" placeholder="Enter your weight" class="border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
            </div>
            <button @click="calculateBMI" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">Calculate</button>
        </div>
    </div>
</div>
</template>

<script setup>
import { ref } from 'vue';
import showAlert from '../helpers/alert';

const heightFeet = ref(null);
const heightInches = ref(null);
const weight = ref(null);
const bmi = ref(null);

const calculateBMI = () => {
    if (validateInputs()) {
        const heightInchesTotal = heightFeet.value * 12 + heightInches.value;
        const heightMeters = heightInchesTotal * 0.0254;
        const bmiValue = weight.value / (heightMeters * heightMeters);
        bmi.value = bmiValue;
    }
};

const validateInputs = () => {
    if (!heightFeet.value || !heightInches.value || !weight.value) {
        showAlert('error', 'Please fill in all fields.');
        return false;
    }
    if (heightFeet.value <= 0 || heightInches.value <= 0 || weight.value <= 0) {
        showAlert('error', 'Values must be greater than zero.');
        return false;
    }
    return true;
};

const getBMIClassification = (bmiValue) => {
    if (bmiValue < 18.5) {
        return 'Underweight';
    } else if (bmiValue >= 18.5 && bmiValue < 25) {
        return 'Normal weight';
    } else if (bmiValue >= 25 && bmiValue < 30) {
        return 'Overweight';
    } else {
        return 'Obese';
    }
};
</script>

<style scoped>

</style>
