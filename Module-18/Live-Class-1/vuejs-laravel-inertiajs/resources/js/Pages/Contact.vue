<script setup>
import { reactive } from 'vue'
import { useForm } from '@inertiajs/vue3'
import Layout from '../components/Layout.vue';
import { Head } from '@inertiajs/vue3'

const form = useForm ({
    name: null,
    email: null,
    message: null,
})

function submit() {
    form.post('/contact')
    form.reset()
}
</script>

<template>
    <Layout>
        <Head>
            <title>Contact</title>
            <meta name="description" content="Contact page description">
        </Head>
        <h1>This is Contact Page</h1>

        <div>
            <h4>Contact Us</h4>
            <div v-if="$page.props.flash.message" class="alert">
                {{ $page.props.flash.message }}
            </div>

            <form @submit.prevent="submit">
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" v-model="form.name">
                    <strong v-if="form.errors.name">{{ form.errors.name }}</strong>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" v-model="form.email">
                    <strong v-if="form.errors.email">{{ form.errors.email }}</strong>
                </div>
                <div>
                    <label for="message">Message</label>
                    <textarea id="message" v-model="form.message"></textarea>
                    <strong v-if="form.errors.message">{{ form.errors.message }}</strong>
                </div>
                <button type="submit" :disabled="form.processing">Submit</button>
            </form>
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
