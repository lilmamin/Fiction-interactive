<script setup>
import { ref, onMounted } from "vue";
import { usePage, router } from "@inertiajs/vue3";

const storyId = usePage().props.storyId;

const chapter = ref(null);
const selectedFeedback = ref("");
const showNextButton = ref(false);

const fetchFirstChapter = async () => {
    try {
        const res = await fetch(`/api/v1/stories/${storyId}/chapters`);
        if (!res.ok) throw new Error("Erreur chargement premier chapitre");
        const chapters = await res.json();
        chapter.value = chapters[0]; // ou adapte selon ta structure
    } catch (error) {
        console.error(error);
    }
};

const fetchChapter = async (id) => {
    try {
        const res = await fetch(`/api/v1/chapters/${id}`);
        if (!res.ok) throw new Error("Chapitre introuvable");
        chapter.value = await res.json();
        selectedFeedback.value = "";
        showNextButton.value = false;
    } catch (error) {
        console.error(error);
        router.visit("/not-found"); // ou définis une page d’erreur
    }
};

onMounted(() => {
    fetchFirstChapter();
});

const selectChoice = (choice) => {
    selectedFeedback.value = choice.feedback;
    showNextButton.value = true;
    chapter.value.next_chapter_id = choice.next_chapter_id;
    chapter.value.is_ending = choice.is_ending;
};

const goToNext = () => {
    if (chapter.value.is_ending) {
        router.visit("/ending");
    } else {
        fetchChapter(chapter.value.next_chapter_id);
    }
};
</script>

<template>
    <div class="chapter">
        <h1>{{ chapter?.title }}</h1>
        <p>{{ chapter?.content }}</p>

        <div v-if="!selectedFeedback">
            <button
                v-for="choice in chapter?.choices || []"
                :key="choice.id"
                @click="selectChoice(choice)"
                class="choice-btn"
            >
                {{ choice.text }}
            </button>
        </div>

        <div v-if="selectedFeedback" class="feedback">
            <p><strong>Feedback :</strong> {{ selectedFeedback }}</p>
            <button @click="goToNext" class="next-btn">Suivant</button>
        </div>
    </div>
</template>

<style scoped>
.chapter {
    padding: 2rem;
    max-width: 700px;
    margin: auto;
    text-align: center;
}
.choice-btn {
    display: block;
    margin: 1rem auto;
    padding: 0.7rem 1.5rem;
    background-color: #f3722c;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.feedback {
    margin-top: 2rem;
}
.next-btn {
    margin-top: 1rem;
    padding: 0.6rem 1.5rem;
    background-color: #2e7d32;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>
