<script setup lang="ts">
import { cn } from '@/lib/utils';
import type { HTMLAttributes } from 'vue';

interface Props {
    modelValue?: boolean;
    class?: HTMLAttributes['class'];
}

const props = defineProps<Props>();
const emit = defineEmits(['update:modelValue']);

const handleChange = (event: Event) => {
    const target = event?.target as HTMLInputElement;
    emit('update:modelValue', target.checked);
};
</script>

<template>
    <input
        type="checkbox"
        :checked="modelValue"
        @change="handleChange"
        :class="cn('checkbox', props.class)"
    />
</template>
