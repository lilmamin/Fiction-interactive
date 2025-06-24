<script setup>
import { ref } from "vue";
import TheHeader from "@/components/TheHeader.vue";
const n = ref(1);
</script>

<template>
    <div>
        <TheHeader />
        <main>
            <router-view />
        </main>
    </div>
</template>

<style scoped></style>
