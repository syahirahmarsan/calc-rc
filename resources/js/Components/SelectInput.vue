<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue']);

defineEmits(['update:modelValue']);

const input = ref(null);

</script>

<template>
    <select class="px-5 py-3 w-full mt-1 hover:border-indigo-300 hover:ring hover:ring-indigo-200 hover:ring-opacity-50 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-black" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="select">
      <slot />
    </select>
</template>
