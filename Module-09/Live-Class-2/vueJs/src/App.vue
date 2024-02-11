<script setup>
  import { ref } from 'vue'
  import OurTeam from './components/OurTeam.vue';
  
  const teamMembers = ref([
    {
      photo: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png',
      name: 'Bonnie Green',
      position: 'CEO & Web Developer',
      about: 'Bonnie drives the technical strategy of the flowbite platform and brand.',
      socialLinks: [
        {
          facebook: '#',
          twitter: '#',
          github: '#',
          linkedin: '#',
        }
      ]
    },
    {
      photo: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png',
      name: 'Jese Leos',
      position: 'CTO',
      about: 'Jese drives the technical strategy of the flowbite platform and brand.',
      socialLinks: [
        {
          facebook: '#',
          twitter: '#',
          github: '#',
          linkedin: '#',
        }
      ]
    },
    {
      photo: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png',
      name: 'Michael Gough',
      position: 'Senior Front-end Developer',
      about: 'Michael drives the technical strategy of the flowbite platform and brand.',
      socialLinks: [
        {
          facebook: '#',
          twitter: '#',
          github: '#',
          linkedin: '#',
        }
      ]
    },
    {
      photo: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/sofia-mcguire.png',
      name: 'Lana Byrd',
      position: 'Marketing & Sale',
      about: 'Lana drives the technical strategy of the flowbite platform and brand.',
      socialLinks: [
        {
          facebook: '#',
          twitter: '#',
          github: '#',
          linkedin: '#',
        }
      ]
    },
  ])
</script>

<template>
    <OurTeam :teamMembers="teamMembers"/>
</template>

<style scoped>

</style>
