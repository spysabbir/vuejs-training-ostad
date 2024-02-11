<script setup>
  import TeamMember from './TeamMember.vue';
  const props = defineProps(['teamMembers'])
</script>

<template>
    <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
        <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our Team</h2>
            <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p>
        </div> 
        <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
          <!-- <TeamMember photo="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png" name="Bonnie Green" position="CEO & Web Developer" about="Bonnie drives the technical strategy of the flowbite platform and brand."/>
          <TeamMember photo="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" name="Jese Leos" position="CTO" about="Jese drives the technical strategy of the flowbite platform and brand."/>
          <TeamMember photo="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png" name="Michael Gough" position="Senior Front-end Developer" about="Michael drives the technical strategy of the flowbite platform and brand."/>
          <TeamMember photo="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/sofia-mcguire.png" name="Lana Byrd" position="Marketing & Sale" about="Lana drives the technical strategy of the flowbite platform and brand."/> -->
        
            <TeamMember v-for="(member, index) in teamMembers" :key="index" :member="member"/>
        </div>  
    </div>
    </section>
</template>