<template>
  <div class="flex items-center justify-between px-6 md:flex-shrink-0 md:justify-center">
    <div class="justify-start">
      <h1 class="opacity-100 font-bold text-5xl visible">
        RunCloud Calculator
      </h1>
      <p class="opacity-60 visible pb-6 text-3xl">
        Estimate your server budget with our cloud calculator anytime and anywhere.
      </p>
      <Link href="/calculate">
        <Button style="font-size: 18px; font-weight: 500;" >
          Start calculate
        </Button>
      </Link>
      
    </div>

    <div class="justify-center">
      <img alt="calc-illustration"  class="load-hidden loaded" style="visibility: visible; opacity: 1" src="images/calc.png" width="500" />
    </div>
    
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Layout from '@/Layouts/Layout.vue'
import Button from '@/Components/Button.vue'

export default{
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