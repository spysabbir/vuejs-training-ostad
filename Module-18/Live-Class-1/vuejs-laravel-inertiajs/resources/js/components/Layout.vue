<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <h1>Module 18 || Live Class 1</h1>
    <p>Vuejs with Laravel (Inertiajs)</p>
    <main>
        <header>
            <Link href="/">Home</Link>
            <Link href="/user">User</Link>
            <Link href="/about">About</Link>
            <Link href="/contact">Contact</Link>
        </header>
        <div>
            <slot />
        </div>
    </main>
</template>

<style scoped>
a {
    margin-right: 10px;
}
</style>
