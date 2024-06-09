<script setup>
import {authStore} from '../store/store';
</script>

<template>
    <div class="container mx-auto bg-slate-500">
        <h1 class="text-2xl mb-3">This is home page</h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam doloremque natus eligendi. Dicta ullam obcaecati quidem blanditiis, illum minus possimus earum adipisci sunt accusantium autem. Saepe molestias quaerat enim. Autem.
        </p>

        <div class="flex justify-center mt-5">
            <ul>
                <li>
                    <router-link to="/login" class="text-blue-500 hover:text-blue-700">Login</router-link>
                </li>
                <li>
                    <router-link to="/register" class="text-blue-500 hover:text-blue-700">Register</router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<style></style>