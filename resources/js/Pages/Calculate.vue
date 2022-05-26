<template>
    <Head title="Calculate" />
    <div class="row place-content-center pt-9 pb-16">
        <div class="mb-5 ">
            <h1 class="text-center text-5xl opacity-100 visible font-bold mb-3" >
                RunCloud Calculator
            </h1>
            <div class="text-center text-2xl opacity-60 visible w-full lg:w-2/4 mx-auto">
                Estimate your server budget with our cloud calculator anytime and anywhere.
            </div>
        </div>

        <form @submit.prevent="submit">

            <div id="calc" v-if="!isHidden" >

                <div class="text-center pt-16 pb-6 visible opacity-100 text-3xl w-full lg:w-3/4 mx-auto">
                    What is the maximum number of simultaneous users that you are expected to have on your website?
                </div>

                <div class="flex justify-center">
                    <div class="w-60 m-2">
                        <InputLabel for="estimation" value="Max users" />
                        <InputNumber type="number" v-model="form.estimation" name="estimation" id="estimation" class="mt-1 block w-full" autocomplete="off" required/>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center mt-3 pt-6 pb-16">
                        <ButtonClick @click="isHidden = true; isShown = true;" >
                            Continue
                        </ButtonClick>
                    </div>
                </div>

            </div>

            <div v-if="isShown">

                <div class="text-center pt-16 pb-6 visible opacity-100 text-3xl w-full lg:w-3/4 mx-auto">
                    What is the type of web application you developing?
                </div>

                <div class="flex justify-center">
                    <div class="w-60 m-2">
                        <InputLabel for="webapp" value="Web app type" />
                        <SelectInput v-model="form.webapp">
                            <option value="" disabled selected>Select web app type</option>
                            <option value="static">Static web app</option>
                            <option value="dynamic">Dynamic web app</option>
                            <option value="ecommerce">E-commerce</option>
                        </SelectInput>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center mt-3 pt-6 pb-16">
                        <ButtonClick @click="isHidden = false; isShown = false;" class="mr-3" >
                            Back
                        </ButtonClick>
                        <ButtonClick type="submit" :disabled="form.processing" >
                            Calculate!
                        </ButtonClick>
                    </div>
                </div>

            </div>
        </form>

        <div class="rounded overflow-hidden shadow-lg bg-gray-200 m-2 w-2/4 text-center text-lg mx-auto">
            <div class="px-6 py-4 text-center m-auto text-black">
                <b>Note that: </b><br> 
                <br>The maximum number of simultaneous users are
                <br>- Static web app = 15000.
                <br>- Dynamic web app = 3800.
                <br>- E-commerce web app = 1900.
            </div>
        </div>
    </div>
</template>

<script>
import { Head, useForm } from '@inertiajs/inertia-vue3'
import Layout from '@/Layouts/Layout.vue'
import ButtonClick from '@/Components/Button.vue'
import InputLabel from '@/Components/Label.vue'
import InputNumber from '@/Components/Input.vue'
import SelectInput from '@/Components/SelectInput.vue'

export default {
    components:{
        Head,
        ButtonClick,
        InputLabel,
        InputNumber,
        SelectInput,
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
        },
    },

}
</script>

<style>

</style>