<template>
    <Head title="Calculate" />
    <div class="row place-content-center p-10 my-auto ">
        <div class="mx-auto pb-6">
            <h1 class="text-center text-5xl opacity-100 visible font-bold" >
                RunCloud Calculator
            </h1>
            <div class="text-center text-2xl opacity-60 visible w-full lg:w-2/4 mx-auto py-4">
                Estimate your server budget with our cloud calculator anytime and anywhere.
            </div>
        </div>

        <form @submit.prevent="submit">

            <div id="calc" v-if="!isHidden" >

                <div class="text-center visible opacity-100 text-3xl w-full lg:w-5/6 mx-auto py-4">
                    What is the maximum number of simultaneous users that you are expected to have on your website?
                </div>

                <div class="flex justify-center">                    
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
                        
                        <Input type="number" min="1" v-model="form.estimation" name="estimation" id="estimation" class="mt-1 block w-full" autocomplete="off" required/>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center mt-3 pt-6 pb-16">
                        <Button @click="isHidden = true; isShown = true; isClicked = true;" :disabled="form.estimation == null || form.estimation <= 0" >
                            Continue
                        </Button>
                    </div>
                </div>

            </div>

            <div v-if="isShown">

                <div class="text-center visible opacity-100 text-3xl w-full lg:w-5/6 mx-auto py-4">
                    What is the type of web application you developing?
                </div>

                <div class="flex justify-center">
                    <div class="w-60 m-2">
                        <Label for="webapp" value="Web app type" />
                        <Select v-model="form.webapp" required>
                            <option value="" disabled selected>Select web app type</option>
                            <option value="static">Static web app</option>
                            <option value="dynamic">Dynamic web app</option>
                            <option value="ecommerce">E-commerce</option>
                        </Select>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center mt-3 pt-6 pb-16">
                        <Button @click="isHidden = false; isShown = false;" class="mr-3" >
                            Back
                        </Button>
                        <Button type="submit" :disabled="form.processing || form.webapp == null || form.webapp == '' " @click="isShown = false" >
                            Calculate!
                        </Button>
                        
                    </div>
                </div>

            </div>
        </form>

        <div v-if="form.processing">
            <div class="text-center pt-16 pb-6 visible opacity-100 text-3xl w-full lg:w-3/4 mx-auto">
                Hold on tight! We are calculating...
            </div>

            <div class="flex justify-center">
                <LoadingSpin />
            </div>
        </div>
    </div>
</template>

<script>
import { Head, useForm } from '@inertiajs/inertia-vue3'
import Layout from '@/Layouts/Layout.vue'
import Button from '@/Components/Button.vue'
import Label from '@/Components/Label.vue'
import Input from '@/Components/Input.vue'
import Select from '@/Components/SelectInput.vue'
import LoadingSpin from '@/Components/SpinnerLoad.vue'
import { InformationCircleIcon } from '@heroicons/vue/solid'
import Tooltip from '@/Components/ToolTips.vue'

export default {
    components:{
        Head,
        Button,
        Label,
        Input,
        Select,
        LoadingSpin,
        InformationCircleIcon,
        Tooltip
    },
    props: {
        errors: Object,
    },
    layout: Layout,
    data() {
        return {
            isHidden: false,
        };
    },
    setup() {
        const form = useForm({
            estimation: null,
            webapp: null,
        })

        return { form }
    },
    methods: {
        submit() {
            this.form.post(route("results"));
            isShown = false;
        },
    },

}
</script>

<style>
    
</style>