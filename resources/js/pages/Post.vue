<script setup lang="ts">

import {Head} from "@inertiajs/vue3";
import AppLayout from "@/layouts/AppLayout.vue";
import {Post} from "@/types/blog";

defineProps<{post:Post}>()
</script>

<template>
    <AppLayout>
        <Head :title="post.title" />

        <div class="max-w-7xl mx-auto p-4 lg:p-6">
            <header class="bg-base-200 text-base-content text-center border border-base-300 p-6 rounded-box">
                <h1 class="text-3xl font-semibold">{{ post.title }}</h1>

                <h3 class="text-lg">{{ post.author.name }}</h3>
                <h3 class="text-lg">{{ post.category.name }}</h3>

                <div v-if="post.tags.length > 0" class="mt-4 flex flex-wrap justify-center gap-1">
                    <div v-for="tag in post.tags" class="badge badge-neutral">{{ tag.name.en }}</div>
                </div>
            </header>

            <div class="space-y-6 max-w-3xl mx-auto mt-6">
                <figure v-html="post.image" />

                <article v-html="post.body" class="prose max-w-3xl mx-auto" />
            </div>
        </div>
    </AppLayout>
</template>
