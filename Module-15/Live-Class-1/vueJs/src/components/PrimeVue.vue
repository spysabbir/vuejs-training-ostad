<script setup>
    import { ref } from 'vue';
    import Rating from 'primevue/rating';
    import Calendar from 'primevue/calendar';
    import FloatLabel from 'primevue/floatlabel';
    import Timeline from 'primevue/timeline';


    const value = ref(null);

    const date = ref();

    const events = ref([
        { status: 'Ordered', date: '15/10/2020 10:30', icon: 'pi pi-shopping-cart', color: '#9C27B0'},
        { status: 'Processing', date: '15/10/2020 14:00', icon: 'pi pi-cog', color: '#673AB7' },
        { status: 'Shipped', date: '15/10/2020 16:15', icon: 'pi pi-shopping-cart', color: '#FF9800' },
        { status: 'Delivered', date: '16/10/2020 10:00', icon: 'pi pi-check', color: '#607D8B' }
    ]);

</script>

<template>
    <div class="card flex justify-content-center mb-5 p-5">
        <Rating v-model="value" />
    </div>

    <div class="card flex justify-content-center bg-yellow-300 p-5 w-96">
        <Calendar v-model="date" placeholder="Select Date" class="bg-white p-1"/>
    </div>
    <div class="card flex justify-content-center bg-pink-400 p-5 w-96">
        <FloatLabel class="bg-cyan-400">
            <Calendar v-model="date" inputId="birth_date"/>
            <label for="birth_date">Birth Date</label>
        </FloatLabel>
    </div>

    <div class="mt-5">
        <Timeline :value="events" align="alternate" class="w-full md:w-20rem">
            <template #content="slotProps">
                {{ slotProps.item.status }}
            </template>
        </Timeline>
    </div>
</template>

