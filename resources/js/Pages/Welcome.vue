<template>
  <div class="flex items-center justify-between mt-16 px-6 py-4 md:flex-shrink-0 md:justify-center">
    
    <div class="pl-5 justify-start">
      <h1 class="load-hidden" style=" visibility: visible; opacity: 1; font-style: bold; font-size: 40px;" >
        <b>RunCloud Calculator</b>
      </h1>
      <p class="text-opacity-6 load-hidden pb-6" style="visibility: visible; opacity: 0.6; font-size: 30px">
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