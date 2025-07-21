<script setup lang="ts">

import {Head} from "@inertiajs/vue3";
import AppLayout from "@/layouts/AppLayout.vue";
import {type Post} from "@/types/blog";

defineProps<{ posts: Post[] }>()
</script>

<template>
    <AppLayout>
        <Head title="Home Page" />

        <div class="max-w-7xl mx-auto p-4 lg:p-6">
            <div class="divider">Blog</div>

                <div v-if="posts.length > 0" class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div v-for="post in posts" class="card bg-base-100 shadow-sm mb-4">
                        <figure v-html="post.image" />
                        <div class="card-body">
                            <h2 class="card-title">{{ post.title }}</h2>
                            <p>{{ post.preview }}</p>
                            <div class="card-actions justify-end">
                                <a :href="route('post.show', post.slug)" class="btn btn-primary">Read Now</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </AppLayout>
</template>
