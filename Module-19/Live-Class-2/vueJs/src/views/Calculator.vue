<template>
<div class="flex justify-center items-center mt-5 p-3 bg-gray-100">
    <div class="bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Calculator</h1>
        <div class="my-4">
            <input type="text" :value="expression" readonly class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
        </div>
        <div class="grid grid-cols-4 gap-4">
            <button @click="appendToExpression('7')" class="col-span-1 btn">7</button>
            <button @click="appendToExpression('8')" class="col-span-1 btn">8</button>
            <button @click="appendToExpression('9')" class="col-span-1 btn">9</button>
            <button @click="clearExpression" class="col-span-1 btn btn-red">C</button>

            <button @click="appendToExpression('4')" class="col-span-1 btn">4</button>
            <button @click="appendToExpression('5')" class="col-span-1 btn">5</button>
            <button @click="appendToExpression('6')" class="col-span-1 btn">6</button>
            <button @click="appendToExpression('+')" :disabled="isOperatorDisabled" class="col-span-1 btn btn-yellow">+</button>

            <button @click="appendToExpression('1')" class="col-span-1 btn">1</button>
            <button @click="appendToExpression('2')" class="col-span-1 btn">2</button>
            <button @click="appendToExpression('3')" class="col-span-1 btn">3</button>
            <button @click="appendToExpression('-')" :disabled="isOperatorDisabled" class="col-span-1 btn btn-yellow">-</button>

            <button @click="appendToExpression('0')" class="col-span-1 btn">0</button>
            <button @click="appendToExpression('.')" class="col-span-1 btn">.</button>
            <button @click="calculateResult" :disabled="isCalculationDisabled" class="col-span-1 btn btn-green">=</button>
            <button @click="appendToExpression('*')" :disabled="isOperatorDisabled" class="col-span-1 btn btn-yellow">*</button>

            <button @click="calculateSquareRoot" :disabled="isOperatorDisabled" class="col-span-1 btn">√</button>
            <button @click="appendToExpression(' / 100')" :disabled="isOperatorDisabled" class="col-span-1 btn">%</button>
            <button @click="clearLastCharacter" class="col-span-1 btn btn-red">DEL</button>
            <button @click="appendToExpression('/')" :disabled="isOperatorDisabled" class="col-span-1 btn btn-yellow">/</button>
        </div>
    </div>
</div>
</template>

<script setup>
import { ref, computed } from 'vue';

const expression = ref('');

const appendToExpression = (char) => {
    expression.value += char;
};

const clearExpression = () => {
    expression.value = '';
};

const clearLastCharacter = () => {
    expression.value = expression.value.slice(0, -1);
};

const calculateResult = () => {
    try {
        expression.value = eval(expression.value).toString();
    } catch (error) {
        expression.value = 'Error';
    }
};

const calculateSquareRoot = () => {
    try {
        const result = Math.sqrt(eval(expression.value));
        expression.value = result.toString();
    } catch (error) {
        expression.value = 'Error';
    }
};

const isCalculationDisabled = computed(() => {
    return expression.value === '';
});

const isOperatorDisabled = computed(() => {
    return expression.value === '';
});
</script>

<style scoped>
.btn {
    padding: 8px;
    font-size: 1.5rem;
    border: 1px solid #e2e8f0;
    background-color: #edf2f7;
}

.btn:hover {
    background-color: #cbd5e0;
}

.btn-red {
    background-color: #f56565;
    color: white;
}

.btn-red:hover {
    background-color: #e53e3e;
}

.btn-yellow {
    background-color: #ecc94b;
}

.btn-yellow:hover {
    background-color: #d69e2e;
}

.btn-green {
    background-color: #48bb78;
    color: white;
}

.btn-green:hover {
    background-color: #38a169;
}
</style>