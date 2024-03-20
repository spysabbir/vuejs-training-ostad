<script setup>
import AuthState from '../data/authstate';
</script>
 
<template>
    <div class="flex w-[800px] mx-auto mt-10" v-if="AuthState.isAuthenticated">
        <div class=" rounded-md h-48 lg:h-auto lg:w-48 flex-none bg-cover text-center overflow-hidden" style="background-image: url('https://images.unsplash.com/photo-1700413739071-d7ca09f1eb7b?q=80&w=3772&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')" title="Woman holding a mug">
        </div>
        <div class=" bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
                <p class="text-sm flex items-center mb-2 text-gray-400">
                    <svg class="fill-current text-emerald-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                    </svg>
                    Welcome {{ AuthState.user.name }}
                </p>
                <div class="text-gray-900 font-bold text-xl mb-2">Carpe Diem</div>
                <p class="text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
            </div>
            <div class="flex items-center">
                <img class="w-10 h-10 rounded-full mr-4" src="https://v1.tailwindcss.com/img/jonathan.jpg" alt="Avatar of Jonathan Reinink">
                <div class="text-sm">
                    <p class="text-gray-900 leading-none">Jonathan Reinink</p>
                    <p class="text-gray-600">Aug 18</p>
                </div>
            </div>
        </div>
    </div>
</template>
 
<style scoped></style>../datao/authstate