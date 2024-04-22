<script setup>
import Layout from '../components/Layout.vue';
import { Head } from '@inertiajs/vue3'

const props = defineProps({
    users: Object
})
</script>

<template>
    <Layout>
        <Head>
            <title>User</title>
            <meta name="description" content="User page description">
        </Head>
        <h1>This is User Page</h1>

        <div v-for="user in users" :key="user.id">
            <p>Name: {{ user.name }}</p>
            <p>Email: {{ user.email }}</p>
        </div>
    </Layout>
</template>

<style scoped>
    div {
        margin-top: 20px;
        padding: 10px;
        border: 1px solid #ccc;
    }
</style>
