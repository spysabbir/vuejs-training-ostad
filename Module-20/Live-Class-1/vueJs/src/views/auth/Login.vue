<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { authStore } from '../../store/store';

const router = useRouter();
const email = ref('admin@email.com');
const password = ref('12345678');

const login = async () => {
  await authStore.login(email.value, password.value);
  if (!authStore.errors) {
    if (authStore.user.role === 'admin') {
      router.push('/admin/dashboard');
    } else {
      router.push('/dashboard');
    }
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
          Login to your account
        </h1>
        <div class="space-y-4 md:space-y-6">
          <div>
            <label class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input v-model="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Email" required>
            <span class="text-red-500" v-if="getFieldError('email')">{{ getFieldError('email') }}</span>
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
            <input v-model="password" type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
            <span class="text-red-500" v-if="getFieldError('password')">{{ getFieldError('password') }}</span>
          </div>
          <p class="text-right">
            <button @click="login" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              Login
            </button>
          </p>
          <router-link to="/register" class="p-1 bg-indigo-300 rounded">
            Don't have an account?
          </router-link>
        </div>
      </div>
    </div>
  </section>
</template>

<style>
/* Add your custom styles here */
</style>
