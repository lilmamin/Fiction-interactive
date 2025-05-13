<script setup>
import { ref, onMounted } from "vue";
import { Head } from "@inertiajs/vue3";

// Props transmises par Inertia via route web.php
const props = defineProps({
    storyId: Number,
});

const chapters = ref([]);
const loading = ref(true);

onMounted(async () => {
    try {
        const response = await fetch(
            `/api/v1/stories/${props.storyId}/chapters`
        );
        if (!response.ok) throw new Error("Erreur lors du chargement");

        chapters.value = await response.json();
    } catch (error) {
        console.error(error.message);
    } finally {
        loading.value = false;
    }
});
</script>

<template>
    <Head title="Chapitres" />

    <div style="padding: 2rem">
        <h1>Chapitres de l’histoire #{{ props.storyId }}</h1>

        <div v-if="loading">Chargement des chapitres...</div>

        <ul v-else-if="chapters.length">
            <li
                v-for="chapter in chapters"
                :key="chapter.id"
                style="margin-bottom: 2rem"
            >
                <h2>{{ chapter.title }}</h2>
                <p>{{ chapter.content }}</p>

                <ul v-if="chapter.choices && chapter.choices.length">
                    <li v-for="choice in chapter.choices" :key="choice.id">
                        <button>{{ choice.text }}</button>
                    </li>
                </ul>
            </li>
        </ul>

        <p v-else>Aucun chapitre trouvé.</p>
    </div>
</template>

<style scoped>
h2 {
    font-size: 1.5rem;
    color: #333;
    margin-top: 1rem;
}
button {
    margin-top: 0.5rem;
    padding: 0.5rem 1rem;
    background: #f3722c;
    border: none;
    color: white;
    cursor: pointer;
}
</style>
