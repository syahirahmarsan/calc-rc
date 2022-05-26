<template>
  <div class="pt-6 px-16 mx-16 mb-6">
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
