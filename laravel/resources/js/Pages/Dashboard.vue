<script setup>
//import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <h2>Vous êtes authentifié·e !</h2>
        <p>
            Bienvenue sur le tableau de bord, veuillez sélectionner une histoire
            :
        </p>
    </AuthenticatedLayout>
</template>

<style scoped>
h2 {
    color: #e3710e;
    font-size: 2rem;
    font-weight: 600;
    margin-top: 10rem;
    margin-left: 10rem;
    font-family: "Poppins", sans-serif;
}
</style>
