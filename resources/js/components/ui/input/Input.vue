<script setup lang="ts">
import { cn } from '@/lib/utils';
import type { HTMLAttributes } from 'vue';

const props = defineProps<{
    defaultValue?: string | number;
    modelValue?: string | number;
    class?: HTMLAttributes['class'];
}>();

defineEmits<{
    (e: 'update:modelValue', payload: string | number): void;
}>();
</script>

<template>
    <input
        v-model="props.modelValue"
        data-slot="input"
        :class="cn('input', props.class)"
    />
</template>
