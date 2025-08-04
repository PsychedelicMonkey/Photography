<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Home Page" />
    <nav>
        <a :href="route('home')">Home</a>
    </nav>

    <h1 class="text-3xl font-semibold">Home Page</h1>
</template>
