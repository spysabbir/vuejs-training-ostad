<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { authStore } from '../../store/store';

const router = useRouter();
const name = ref('');
const email = ref('');
const password = ref('');
const confirmPassword = ref('');

const register = async () => {
  await authStore.register(name.value, email.value, password.value, confirmPassword.value);
  if (!authStore.errors) {
    router.push('/login');
  }
};

const getFieldError = (field) => {
  if (authStore.errors && authStore.errors[field]) {
    return authStore.errors[field][0];
  }
  return null;
};
</script>

<template>
  <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
    <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
          Register to your account
        </h1>
        <div class="space-y-4 md:space-y-6">
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Name</label>
            <input v-model="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Name" required>
            <span class="text-red-500" v-if="getFieldError('name')">{{ getFieldError('name') }}</span>
          </div>
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input v-model="email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Email" required>
            <span class="text-red-500" v-if="getFieldError('email')">{{ getFieldError('email') }}</span>
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
            <input v-model="password" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Password" required>
            <span class="text-red-500" v-if="getFieldError('password')">{{ getFieldError('password') }}</span>
          </div>
          <div>
            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
            <input v-model="confirmPassword" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Confirm Password" required>
            <span class="text-red-500" v-if="getFieldError('confirm_password')">{{ getFieldError('confirm_password') }}</span>
          </div>
          <p class="text-right">
            <button @click="register" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              Register
            </button>
          </p>
          <router-link to="/login" class="p-1 bg-indigo-300 rounded">
            Already have an account?
          </router-link>
        </div>
      </div>
    </div>
  </section>
</template>

<style>
/* Add your custom styles here */
</style>
