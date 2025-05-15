<template>
    <div class="ending">
        <h1>🎉 Fin de l'histoire</h1>
        <p>Merci d'avoir joué !</p>
        <router-link to="/" class="restart-link">Recommencer</router-link>
    </div>
</template>

<script setup></script>

<style scoped>
.ending {
    text-align: center;
    padding: 2rem;
}
.restart-link {
    display: inline-block;
    margin-top: 2rem;
    padding: 0.7rem 1.5rem;
    background-color: #0288d1;
    color: white;
    border-radius: 5px;
    text-decoration: none;
}
</style>
