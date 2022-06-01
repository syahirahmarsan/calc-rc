<template>
  <Head title="Results" />
    <div class="container-fluid p-10">
         <div class="mb-5 ">
            <h1 class="text-center text-5xl opacity-100 visible font-bold mb-3" >
                RunCloud Calculator
            </h1>
        </div>
        <form @submit.prevent="update">
            <div class="flex justify-center w-full">
                <div class="w-60 m-2">
                    <div class="flex justify-between">
                        <Label for="estimation" value="Max users " />
                        <Tooltip
                            text="Note that:
                            1. Do not select your monthly, weekly, or daily number of users but rather the number of users on your website at the same time during peak use.
                            2. If you're just starting out, we recommend selecting 100 or less for this question as to avoid unnecessarily high costs in the early days of your business."
                            >
                            <InformationCircleIcon class="h-5 w-5 text-gray-200 hover:animate-bounce" />
                        </Tooltip>
                    </div>
                    <Input type="number" min="1" name="estimation" id="estimation" class="mt-1 block w-full" v-model="form.estimation" required autocomplete="off" />
                </div>
                <div class="w-60 m-2">
                    <Label for="webapp" value="Web application type" />
                    <Select v-model="form.webapp" class="w-full" required>
                        <option value="" disabled>Select web app type</option>
                        <option value="static">Static web app</option>
                        <option value="dynamic">Dynamic web app</option>
                        <option value="ecommerce">E-commerce</option>
                    </Select>
                </div>

                <div class="m-2 self-end">
                    <Button style="font-size: 16px; font-weight: 500; height: 30;" :disabled="form.processing || form.estimation == 0" type="submit">
                        Recalculate!
                    </Button>
                </div>
            </div>
        </form>

        <div v-if="listCount == 0">
            <div class="text-center pt-16 pb-6 visible opacity-100 text-3xl w-full lg:w-3/4 mx-auto" >
                Sorry, we couldn't find any servers that might suit your maximum number of simultaneous users and web application type.<br> 
                <br>The maximum number of simultaneous users are
                <br>- Static web app = 15000.
                <br>- Dynamic web app = 3800.
                <br>- E-commerce web app = 1900.
            </div>
        </div>
        
        <div v-else>
            <div class="text-center pt-16 pb-6 visible opacity-100 text-3xl w-full lg:w-3/4 mx-auto" >
                We think these servers might suits you.
            </div>

            <div class="grid lg:grid-cols-6 sm:grid-cols-2 md:grid-cols-3 place-content-center">
                <div v-for="post in lists.data" :key="post.id" class="rounded overflow-hidden shadow-lg bg-white m-2">                
                    <div class="px-6 py-4 text-center m-auto">
                      <div hidden>
                          {{ post.id }}
                      </div>
                      <div class="font-bold text-4xl mb-5 text-black">
                          ${{ post.price }}
                      </div>
                      <img class="lg:w-52 md:w-26 mb-5 m-auto" :src="`images/${post.logo}`">

                      <div class="font-semibold text-xl mb-2 text-black m-auto">
                      
                        <p class="text-base">
                            VCPU {{ post.vcpu }} Core
                        </p>
                        <p class="text-base">
                            Memory {{ post.memory }} GB
                        </p>
                        <p class="text-base">
                            Storage {{ post.storage }} GB
                        </p>
                        <p class="text-base">
                            Transfer {{ post.transfer }} TB
                        </p>
                        <p class="text-base first-letter:uppercase" v-if="post.type !== null">
                            {{ post.type }}
                        </p>
                        <p class="text-base first-letter:uppercase" v-if="post.info !== null">
                            {{ post.info }}
                        </p>
                      </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

  
</template>

<script>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import Layout from "@/Layouts/Layout.vue";
import Button from "@/Components/Button.vue";
import Label from "@/Components/Label.vue";
import Input from "@/Components/Input.vue";
import Select from '@/Components/SelectInput.vue'
import { InformationCircleIcon } from '@heroicons/vue/solid'
import Tooltip from '@/Components/ToolTips.vue'

export default {
  components: {
    Head,
    Link,
    Button,
    Input,
    Label,
    Select,
    InformationCircleIcon,
    Tooltip
  },
  props: {
    lists: Object,
    bandwidth: Number,
    estimation: String,
    webapp: String,
    storage: Number,
    vcpu: Number,
    listCount: Number,
  },
  remember: 'form',
  data() {
      return {
          form: this.$inertia.form({
              estimation: this.estimation,
              webapp: this.webapp,
          })
      }
  },
  methods: {
        update() {
            this.form.post(route("results"));
        },
    },
    
  layout: Layout,
};
</script>

<style>

</style>