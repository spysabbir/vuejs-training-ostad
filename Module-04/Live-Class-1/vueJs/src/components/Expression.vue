<script setup>
    const number = 16
    const checkNumber = () => {
        return (number % 2) == 0 ? "Even" : "Odd"
    }

    const status = false

    const msg = "Hello vueJs 3"
</script>

<template>
    <!-- <span>{{ number }} number is : <strong>{{ checkNumber() }}</strong></span> -->

    <!-- <span>{{ status ? "Complete" : "Pending" }}</span> -->

    <p>{{ msg.split('').reverse().join('') }}</p>
</template>

<style scoped>

</style>