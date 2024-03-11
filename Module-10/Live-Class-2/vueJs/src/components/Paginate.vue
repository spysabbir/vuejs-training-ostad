<script setup>
    import { ref } from 'vue'
    import { data, fn } from './../data'

    const changePage = (status) => {
        if(status == 'prev') {
            if(data.page > 1) {
                data.page--;
            }
        }else{
            if(data.page < (data.posts.length / 6)) {
                data.page++;
            }
        }
    }
</script>

<template>
<div class="flex justify-center items-center m-6">
    <button @click="changePage('prev')" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
        Prev
    </button>
    <button @click="changePage('next')" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
        Next
    </button>
</div>
</template>

<style scoped>

</style>