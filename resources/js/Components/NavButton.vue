<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex justify-center rounded-md border border-black px-4 py-2 bg-yellow-500 text-base leading-6 font-medium text-black shadow-sm sm:text-sm sm:leading-5 hover:bg-yellow-700 hover:text-white active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
        <slot />
    </button>
</template>
