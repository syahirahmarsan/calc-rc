<template>
  <Head title="Calculate" />
    <div class="container-fluid pt-9">
        <div class="mb-5">
            <h1 class="text-center" style=" visibility: visible;opacity: 1;font-style: bold;font-size: 40px; " >
                <b>RunCloud Calculator</b>
            </h1>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Layouts/Layout.vue'
import Button from '@/Components/Button.vue'

export default {
    components: {
      Head,
      Link,
      Button,
    },
    layout: Layout,
}
</script>

<style>

</style>