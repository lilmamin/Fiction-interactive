<script setup>
import { Head, Link, router } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

function logout() {
    router.post(route("logout"));
}
</script>

<template>
    <Head title="Accueil" />

    <div class="min-h-screen flex flex-col justify-between bg-white text-black">
        <!-- HEADER -->
        <header class="flex justify-between items-center p-6 shadow-md">
            <h1 class="text-2xl font-bold text-[#e44d26]">
                Fiction Interactive
            </h1>

            <nav v-if="canLogin" class="flex space-x-4 items-center">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="rounded px-4 py-2 bg-gray-100 hover:bg-gray-200 text-sm"
                >
                    Dashboard
                </Link>

                <button
                    v-if="$page.props.auth.user"
                    @click="logout"
                    class="rounded px-4 py-2 bg-red-500 text-white hover:bg-red-600 text-sm"
                >
                    Se déconnecter
                </button>

                <template v-else>
                    <Link
                        :href="route('login')"
                        class="rounded px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 text-sm"
                    >
                        Se connecter
                    </Link>
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="rounded px-4 py-2 bg-green-600 text-white hover:bg-green-700 text-sm"
                    >
                        S’inscrire
                    </Link>
                </template>
            </nav>
        </header>

        <!-- MAIN -->
        <main class="p-10 text-center">
            <h2 class="text-3xl font-semibold mb-4">
                Bienvenue dans votre aventure narrative
            </h2>
            <p class="text-gray-700">
                Connectez-vous pour découvrir et vivre une histoire interactive
                captivante.
            </p>
        </main>

        <!-- FOOTER -->
        <footer class="text-center text-sm text-gray-500 p-4">
            &copy; 2025 - Projet Fiction Interactive
        </footer>
    </div>
</template>
