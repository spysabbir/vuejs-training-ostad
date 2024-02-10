<script setup>
    import { ref, computed } from 'vue';
    const props = defineProps(['applicants'])
    const activeIndex = ref(0)

    // const person = ref(props.applicants[activeIndex.value])
    const person = computed(() => props.applicants[activeIndex.value])
</script>

<template>
<div class="flex items-center justify-between">
    <div class="border border-gray-500 p-3">
        <!-- <span v-for="(applicant, index) in applicants" :key="applicant.email" @click="person=applicants[index]" class="text-2xl p-1 bg-indigo-400 my-1 block cursor-pointer hover:bg-indigo-700">{{ applicant.name }}</span> -->
        <span v-for="(applicant, index) in applicants" :key="applicant.email" @click="activeIndex=index" class="text-2xl p-1 bg-indigo-400 my-1 block cursor-pointer hover:bg-indigo-700">{{ applicant.name }}</span>
    </div>
    <div class="border border-gray-500 p-3">
        <h2 class="text-xl mb-3">Application {{ activeIndex+1 }}</h2>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Key
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Value
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="col" class="px-6 py-3">
                            Full name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ person.name }}
                        </th>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Application for
                        </th>
                        <td class="px-6 py-4">
                            {{ person.position }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Email address
                        </th>
                        <td class="px-6 py-4">
                            {{ person.email }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Salary expectation
                        </th>
                        <td class="px-6 py-4">
                            {{ person.salary }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            About
                        </th>
                        <td class="px-6 py-4">
                            {{ person.about }}
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Attachment
                        </th>
                        <td class="px-6 py-4">
                            <div v-for="(attachment, index) in person.attachments" :key="index" class="flex justify-between	">
                                <span class="text-indigo-600">{{ attachment.name }} ({{ attachment.size }})</span>
                                <a :href="attachment.url" class="text-indigo-200">Download</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>