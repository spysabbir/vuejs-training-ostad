<script setup>
    import { ref } from "vue";
    const items = [
      {
        id: 1,
        name: "Leanne Graham",
        username: "Bret",
        email: "Sincere@april.biz",
        phone: "1-770-736-8031 x56442",
        website: "hildegard.org",
      },
      {
        id: 2,
        name: "Ervin Howell",
        username: "Antonette",
        email: "Shanna@melissa.tv",
        phone: "010-692-6593 x09125",
        website: "anastasia.net",
      },
      {
        id: 3,
        name: "Clementine Bauch",
        username: "Samantha",
        email: "Nathan@yesenia.net",
        phone: "1-463-123-4447",
        website: "ramiro.info",
      },
      {
        id: 4,
        name: "Patricia Lebsack",
        username: "Karianne",
        email: "Julianne.OConner@kory.org",
        phone: "493-170-9623 x156",
        website: "kale.biz",
      },
      {
        id: 5,
        name: "Chelsey Dietrich",
        username: "Kamren",
        email: "Lucio_Hettinger@annie.ca",
        phone: "(254)954-1289",
        website: "demarco.info",
      },
    ];
    const showModal = ref(false);
</script>

<template>
    <div class="mb-5 border">
        <VaButton @click="showModal = true">
            Show modal with close icon
        </VaButton>
        <VaModal
            v-model="showModal"
            ok-text="Apply"
            close-button
        >
            <h3 class="va-h3">
            Title
            </h3>
            <p>
            Classic modal overlay which represents a dialog box or other interactive
            component, such as a dismissible alert, sub-window, etc.
            </p>
        </VaModal>
    </div>

    <div class="mt-5 border">
        <VaDataTable :items="items" />
    </div>
</template>

<style scoped>
</style>