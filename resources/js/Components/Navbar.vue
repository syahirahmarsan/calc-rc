<template>
  <div class="md:flex md:flex-shrink-0">
    <div class="flex items-center justify-between px-6 py-4 bg-transparent md:flex-shrink-0 md:justify-center md:w-56">
      <Link class="mt-1" href="/">
          <Logo class="navbar-brand" width="200" height="30" />
      </Link>
    </div>
    <div class="md:text-md flex items-center justify-end w-full text-sm bg-transparent md:py-0 pr-2">
      <a href="https://manage.runcloud.io/auth/login" alt="sign-in-to-runcloud" class="mx-6 my-4">Sign in</a>
      <Button @click="openFunc()" class="mr-6">Sign up</Button>
    </div>
  </div>
  
</template>

<script>
import Logo from '@/Components/Logo.vue'
import { Link } from '@inertiajs/inertia-vue3'
import Button from '@/Components/NavButton.vue'

export default {
  name: "Navbar",
  components: {
    Logo,
    Link,
    Button,
    
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    openFunc: function () {
      window.open("https://manage.runcloud.io/auth/register");
    }
  },
};
</script>

