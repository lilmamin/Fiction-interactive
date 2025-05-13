<script setup>
import { ref, onMounted } from "vue";
import { Head, router } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

function logout() {
    router.post(route("logout"));
}

// Liste des histoires
const stories = ref([]);

onMounted(async () => {
    const response = await fetch("http://localhost:8000/api/v1/stories");
    if (response.ok) {
        stories.value = await response.json();
    } else {
        console.error("Erreur lors du chargement des histoires");
    }
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- Bouton de déconnexion -->
        <div
            style="display: flex; justify-content: flex-end; padding: 1rem 2rem"
        >
            <button
                @click="logout"
                style="
                    background-color: #e44d26;
                    color: white;
                    border: none;
                    padding: 0.5rem 1rem;
                    border-radius: 4px;
                    cursor: pointer;
                "
            >
                Se déconnecter
            </button>
        </div>

        <h2>Vous êtes authentifié·e !</h2>
        <p>
            Bienvenue sur le tableau de bord, veuillez sélectionner une histoire
            :
        </p>

        <ul style="margin-left: 10rem; margin-top: 2rem">
            <li v-for="story in stories" :key="story.id">
                <a :href="`/story/${story.id}`">{{ story.title }}</a>
            </li>
        </ul>
    </AuthenticatedLayout>
</template>

<style scoped>
h2 {
    color: #e3710e;
    font-size: 2rem;
    font-weight: 600;
    margin-top: 2rem;
    margin-left: 10rem;
    font-family: "Poppins", sans-serif;
}
p {
    color: #413b36;
    font-size: 1rem;
    font-weight: 400;
    margin-top: 2rem;
    margin-left: 10rem;
    font-family: "Poppins", sans-serif;
}
</style>
