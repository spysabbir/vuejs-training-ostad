<script setup>
import { onBeforeMount } from 'vue';
import { order } from '../store/order'
import { authStore } from '../store/store'

onBeforeMount(() => {
})

function toggleProducts(){
}
</script>
 
<template>
    <div class="bg-white">
        <div class="mx-auto px-12 py-8 ">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Cart</h2>
            <p class="my-10">
            </p>
        </div>
        <div class="px-12 py-8 ">
            <div class="my-2" >
                <div class="order-info flex justify-between w-full">
                    <p class="w-1/3"><strong>Order ID:</strong> 1</p>
                    <p class="w-1/3"><strong>Total Amount:</strong> $20</p>
                    <p class="text-right w-1/3">
                        <button @click="toggleProducts()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
                            Show Detail
                        </button>
                    </p>
                    <hr>
                </div>
                <!-- Show products for the current order when toggled -->
                <div class="border my-5 p-5">
                    <div class="flex items-center my-3">
                        <p class="w-2/3">
                            Product 1
                        </p>
                        <p class="w-[100px]">$10</p>
                        <p>Quantity: 1</p>
                    </div>
                    <div class="flex items-center my-3">
                        <p class="w-2/3">
                            Product 1
                        </p>
                        <p class="w-[100px]">$10</p>
                        <p>Quantity: 1</p>
                    </div>
                </div>
            </div>
            <div class="my-2" >
                <div class="order-info flex justify-between w-full">
                    <p class="w-1/3"><strong>Order ID:</strong> 1</p>
                    <p class="w-1/3"><strong>Total Amount:</strong> $20</p>
                    <p class="text-right w-1/3">
                        <button @click="toggleProducts()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
                            Show Detail
                        </button>
                    </p>
                    <hr>
                </div>
                <!-- Show products for the current order when toggled -->
                <div class="border my-5 p-5">
                    <div class="flex items-center my-3">
                        <p class="w-2/3">
                            Product 1
                        </p>
                        <p class="w-[100px]">$10</p>
                        <p>Quantity: 1</p>
                    </div>
                    <div class="flex items-center my-3">
                        <p class="w-2/3">
                            Product 1
                        </p>
                        <p class="w-[100px]">$10</p>
                        <p>Quantity: 1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
 
<style scoped></style>