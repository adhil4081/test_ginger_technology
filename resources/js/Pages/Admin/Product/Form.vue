<script setup>
    import AdminLayout from "@/Pages/Admin/Layout/AdminLayout.vue";
    import InputLabel from "@/Components/InputLabel.vue";
    import TextInput from "@/Components/TextInput.vue";
    import InputError from "@/Components/InputError.vue";
    import { Link, useForm } from "@inertiajs/vue3";

    const props = defineProps({
        for_edit: Boolean,
        categories: Object,
        product: Object,
    })

    const form = useForm({
        category: props.product ? props.product?.category?.id : '',
        name: props.product ? props.product?.name : '',
        description: props.product ? props.product?.description : '',
        image: props.product ? props.product?.image_path : '',
    })

    function submit() {
        form.post(route('admin:products.store'))
    }

    function update(id) {
        form.put(route('admin:products.update', id))
    }

    function handleImage(event) {
        form.image = event?.target?.files[0]
    }
</script>

<template>
    <AdminLayout>
        <div class="">
            <p class="font-medium text-2xl">Add Product</p>
            <select v-model="form.category" id="countries" class="rounded-lg">
                <option selected>Choose category</option>
                <option v-for="item in categories" :value="item.id">{{item.name}}</option>
            </select>
            <InputError :message="form.errors.category" class="mt-2" />
            <InputLabel :value="'Product Name'" class=mt-5 />
            <TextInput v-model="form.name" class="mt-2" />
            <InputError :message="form.errors.name" class="mt-2" />

            <label for="message" class="block mb-2 text-sm font-medium">Your
                description</label>
            <textarea v-model="form.description" id="message" rows="4" class="block p-2.5 w-full text-sm  rounded-lg"
                placeholder="Write description"></textarea>
            <InputError :message="form.errors.description" class="mt-2" />



            <label class="block mb-2 text-sm font-medium " for="file_input">Upload
                file</label>
            <input @change="handleImage" class="block w-full text-sm " id="file_input" type="file">
            <InputError :message="form.errors.image" class="mt-2" />

            <button @click="for_edit ? update(category?.id):submit()" :disabled="form.processing"
                class="block p-2 px-4 bg-blue-400 text-white rounded lg mt-5">{{for_edit ? 'Update' :
                'Submit'}}</button>
        </div>
    </AdminLayout>
</template>