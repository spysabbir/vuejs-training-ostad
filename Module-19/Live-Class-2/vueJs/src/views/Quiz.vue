<template>
<div class=" bg-gray-100 flex flex-col items-center justify-center p-4">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-2xl" v-if="!quizStarted">
        <h1 class="text-2xl font-bold mb-4 text-center">Quiz</h1>
        <!-- Initial page with confirmation button -->
        <div class="mb-4 text-center">
            <p class="text-lg">Total Questions: {{ questions.length }}</p>
            <p class="text-lg">Every Question Mark: {{ 10 }}</p>
            <p class="text-lg">Total Marks: {{ totalMarks }}</p>
            <p class="text-lg">Pass Marks: 50</p>
            <p class="text-lg">Every Question Answer Time: 15s</p>
            <p class="text-lg">Total Time: {{ 15 * questions.length }}s</p>
            <button @click="startQuiz" class="bg-blue-500 text-white px-4 py-2 mt-5 rounded hover:bg-blue-600">
                Start Quiz
            </button>
        </div>
    </div>

    <div v-else class="bg-gray-500 p-5 rounded">
        <div v-if="showResults" class="text-center">
            <p class="text-lg mb-4">Your Score: {{ score }} / {{ totalMarks }}</p>
            <p class="text-lg mb-4">Total Time: {{ formatTime(totalTime) }}</p>
            <p class="text-lg mb-4" :class="{'bg-green-500': score >= 50, 'bg-red-500': score < 50}">
                {{ score >= 50 ? 'Pass' : 'Fail' }}
            </p>
            <button @click="resetQuiz" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Restart Quiz
            </button>
        </div>

        <div v-else class="bg-gray-300 p-5 rounded">
            <div class="mb-4">
                <p class="text-lg">
                    Question {{ currentQuestionIndex + 1 }} of {{ questions.length }}
                </p>
                <div class="h-2 bg-gray-300 rounded-full overflow-hidden mt-2">
                    <div class="h-full bg-blue-500" :style="{ width: `${progressPercentage}%` }"></div>
                </div>
                <p class="text-lg text-red-500 mt-2">Time Remaining: {{ timeRemaining }}s</p>
                <p class="text-lg text-gray-600 mt-2">Total Time: {{ formatTime(totalTime) }}s</p>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">
                    {{ currentQuestion.question }}
                </h2>
                <ul>
                    <li v-for="(option, index) in currentQuestion.options" :key="index" @click="selectOption(index)" class="cursor-pointer py-2 px-4 mb-2 rounded-md border hover:bg-gray-600 " :class="{ 'bg-blue-500 text-white': selectedOption === index }" >
                        {{ option }}
                    </li>
                </ul>
            </div>

            <div class="flex justify-between">
                <button @click="submitAnswer" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Submit Answer
                </button>
                <button @click="skipQuestion" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                    Skip Question
                </button>
            </div>
        </div>
    </div>
</div>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue';

const questions = ref([
    {
        question: 'What is the capital of Bangladesh?',
        options: ['Chittagong', 'Khulna', 'Dhaka', 'Sylhet'],
        answer: 2,
    },
    {
        question: 'Which river is the longest in Bangladesh?',
        options: ['Brahmaputra', 'Jamuna', 'Meghna', 'Padma'],
        answer: 3,
    },
    {
        question: 'What is the national flower of Bangladesh?',
        options: ['Lotus', 'Water Lily', 'Marigold', 'Rose'],
        answer: 1,
    },
    {
        question: 'When did Bangladesh gain its independence?',
        options: ['1952', '1965', '1971', '1980'],
        answer: 2,
    },
    {
        question: 'Which city is known as the "Port City" of Bangladesh?',
        options: ['Dhaka', 'Rajshahi', 'Chittagong', 'Sylhet'],
        answer: 2,
    },
    {
        question: 'Which national park is the largest in Bangladesh?',
        options: ['Lawachara National Park', 'Sundarbans National Park', 'Madhupur National Park', 'Himchari National Park'],
        answer: 1,
    },
    {
        question: 'Which year did Bangladesh become a member of the United Nations?',
        options: ['1972', '1974', '1980', '1985'],
        answer: 1,
    },
]);

const currentQuestionIndex = ref(0);
const selectedOption = ref(null);
const score = ref(0);
const showResults = ref(false);
const timeRemaining = ref(15);
const timer = ref(null);
const totalTime = ref(0);
const quizStarted = ref(false);

const currentQuestion = computed(() => questions.value[currentQuestionIndex.value]);
const progressPercentage = computed(() => ((currentQuestionIndex.value + 1) / questions.value.length) * 100);
const totalMarks = computed(() => questions.value.length * 10);

const selectOption = (index) => {
    selectedOption.value = index;
};

const submitAnswer = () => {
    if (selectedOption.value === null && timeRemaining.value > 0) return;

    if (selectedOption.value === currentQuestion.value.answer) {
        score.value += 10;
    }

    if (currentQuestionIndex.value < questions.value.length - 1) {
        currentQuestionIndex.value++;
        selectedOption.value = null;
        resetTimer();
    } else {
        showResults.value = true;
        clearInterval(timer.value);
    }
};

const skipQuestion = () => {
    if (currentQuestionIndex.value < questions.value.length - 1) {
        currentQuestionIndex.value++;
        selectedOption.value = null;
        resetTimer();
    } else {
        showResults.value = true;
        clearInterval(timer.value);
    }
};

const resetQuiz = () => {
    currentQuestionIndex.value = 0;
    selectedOption.value = null;
    score.value = 0;
    showResults.value = false;
    totalTime.value = 0;
    resetTimer();
};

const startQuiz = () => {
    quizStarted.value = true;
    startTimer();
};

const startTimer = () => {
    if (quizStarted.value) {
        clearInterval(timer.value);
        timer.value = setInterval(() => {
            if (timeRemaining.value > 0) {
            timeRemaining.value--;
            totalTime.value++;
            } else {
            skipQuestion();
            }
        }, 1000);
    }
};

const resetTimer = () => {
    timeRemaining.value = 15;
    startTimer();
};

const formatTime = (seconds) => {
    const mins = Math.floor(seconds / 60);
    const secs = seconds % 60;
    return `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
};

onMounted(() => {

});

watch(showResults, (newVal) => {
    if (newVal) {
        clearInterval(timer.value);
    }
});
</script>

<style scoped>

</style>
