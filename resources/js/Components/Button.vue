<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-5 py-3 bg-yellow-500 border border-black rounded-md font-medium text-base text-black  hover:bg-yellow-700 hover:text-white active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-300 hover:scale-105 disabled:bg-slate-500 disabled:text-slate-200 disabled:scale-100">
        <slot />
    </button>
</template>
