<template>
  <div class="m-auto w-11/12 h-full">
    <navbar />
    <div class="row align-items-center">
      <slot />            
    </div>
  </div>
</template>

<script>
import Vue from 'vue'
import navbar from '@/Components/Navbar'

export default {
  components: { navbar },
  name: "App", 
}
</script>
