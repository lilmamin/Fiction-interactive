import { createRouter, createWebHistory } from "vue-router";
import ChapterDetailPage from "@/views/ChapterDetailPage.vue";

const routes = [
    {
        path: "/story/:storyId/chapters/:chapterId",
        name: "chapter-detail",
        component: ChapterDetailPage,
        props: true,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
