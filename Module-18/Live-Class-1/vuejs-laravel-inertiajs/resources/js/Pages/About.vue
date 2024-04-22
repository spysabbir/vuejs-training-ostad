<script setup>
import Layout from '../components/Layout.vue';
import { Head } from '@inertiajs/vue3'

const props = defineProps({
    about: Object
})
</script>

<template>
     <Layout>
        <Head>
            <title>About</title>
            <meta name="description" content="About page description">
        </Head>
        <h1>This is About Page</h1>

        <div>
            <h4>{{ about.name }}</h4>
            <p>
                {{ about.description }}
            </p>
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
