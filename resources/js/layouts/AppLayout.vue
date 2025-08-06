<script setup lang="ts">
import Navbar from '@/components/Navbar.vue';
import { computed } from 'vue';

interface Props {
    class?: string;
}

const props = defineProps<Props>();
const className = computed(() => props.class);
</script>

<template>
    <Navbar />
    <main class="mx-auto flex h-full w-full max-w-7xl flex-1 flex-col gap-4 rounded-xl p-4 lg:p-6" :class="className">
        <slot />
    </main>
</template>
