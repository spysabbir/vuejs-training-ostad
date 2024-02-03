<script setup>
  import { ref, reactive } from 'vue';

  const quizs = reactive([
    { question: "Its number is one (1)", answer: 'Yes' },
    { question: "Its number is two (2)", answer: 'Yes' },
    { question: "Its number is three (4)", answer: 'No' },
    { question: "Its number is four (4)", answer: 'Yes' },
    { question: "Its number is five {6}", answer: 'No' },
    { question: "Its number is six {6}", answer: 'Yes' },
  ]);
  const score = ref(0);
  const calculateScore = () => {
    let score = 0;
    quizs.forEach((quiz) => {
      if (quiz.answer === quiz.input) {
        score++;
      }
    });
    return score;
  };
</script>

<template>
  <div class="container mx-auto">
    <p>Your Score: {{ calculateScore() }}</p>
    <div class="mt-3 border border-gray-400 p-1" v-for="(quiz, index) in quizs" :key="index">
      <p>{{ quiz.question }}</p>
      <div class="flex justify-around">
        <div>
          <input type="radio" value="Yes" v-model="quiz.input" :id="'Yes-' + index">
          <label :for="'Yes-' + index" class="ml-2">Yes</label>
        </div>
        <div>
          <input type="radio" value="No" v-model="quiz.input" :id="'No-' + index">
          <label :for="'No-' + index" class="ml-2">No</label>
        </div>
      </div>
    </div>
  </div>
</template>
