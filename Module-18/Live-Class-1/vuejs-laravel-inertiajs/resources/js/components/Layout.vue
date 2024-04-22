<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
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
