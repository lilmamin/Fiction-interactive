<script setup>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import { useFetchJson } from "@/composables/useFetchJson.js";
import { router } from "@inertiajs/vue3";

const route = useRoute();
const router = useRouter();

const storyId = route.params.storyId;
const chapterId = route.params.chapterId;

//réactivité choix de l'utilisateur
const selectedChoice = ref(null);
const showFeedback = ref(false);

//appel API
const {
    data: chapter,
    loading,
    error,
} = useFetchJson({
    url: `/api/v1/chapters/${chapterId}`,
});

function chooseOption(choice) {
    selectedChoice.value = choice;
    showFeedback.value = true;
    console.log("is_ending ?", choice.is_ending);
    console.log("next_chapter_id ?", choice.next_chapter_id);
}

function goToNextChapter() {
    if (!selectedChoice.value) return;

    if (
        selectedChoice.value.is_ending === true ||
        selectedChoice.value.is_ending === 1
    ) {
        // Redirection vers le dashboard (attention : router.visit, pas push)
        router.visit("/dashboard");
    } else if (selectedChoice.value.next_chapter_id) {
        router.push({
            name: "chapter-detail",
            params: {
                storyId,
                chapterId: selectedChoice.value.next_chapter_id,
            },
        });
    }
}
</script>

<template>
    <div style="padding: 2rem">
        <h1 v-if="chapter">{{ chapter.title }}</h1>
        <p v-if="chapter">{{ chapter.content }}</p>

        <div v-if="loading">Chargement...</div>
        <div v-if="error">Erreur de chargement.</div>

        <ul v-if="chapter && !showFeedback">
            <li
                v-for="choice in chapter.choices"
                :key="choice.id"
                style="margin-top: 1rem"
            >
                <button @click="chooseOption(choice)">
                    {{ choice.text }}
                </button>
            </li>
        </ul>

        <div v-if="showFeedback && selectedChoice">
            <p style="margin-top: 2rem; font-style: italic">
                {{ selectedChoice.feedback }}
            </p>
            <button style="margin-top: 1.5rem" @click="goToNextChapter">
                {{ selectedChoice?.is_ending ? "Recommencer" : "Suivant" }}
            </button>
        </div>
    </div>
</template>

<style scoped>
button {
    background: #f3722c;
    color: white;
    border: none;
    padding: 0.7rem 1.2rem;
    cursor: pointer;
    font-size: 1rem;
    border-radius: 5px;
}
button:hover {
    background: #d95f1f;
}
</style>
