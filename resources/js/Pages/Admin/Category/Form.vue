<script setup>
    import AdminLayout from "@/Pages/Admin/Layout/AdminLayout.vue";
    import InputLabel from "@/Components/InputLabel.vue";
    import TextInput from "@/Components/TextInput.vue";
    import InputError from "@/Components/InputError.vue";
    import { Link, useForm } from "@inertiajs/vue3";

    const props = defineProps({
        for_edit: Boolean,
        category: Object
    })

    const form = useForm({
        name: props.category ? props.category?.name : ''
    })

    function submit() {
        form.post(route('admin:categories.store'))
    }

    function update(id) {
        form.put(route('admin:categories.update',id))
    }
</script>

<template>
    <AdminLayout>
        <div class="">
            <p class="font-medium text-2xl">Add Category</p>
            <InputLabel :value="'Category Name'" class=mt-5 />
            <TextInput v-model="form.name" class="mt-2" />
            <InputError :message="form.errors.name" class="mt-2" />
            <button @click="for_edit ? update(category?.id):submit()" :disabled="form.processing"
                class="block p-2 px-4 bg-blue-400 text-white rounded lg mt-5">{{for_edit ? 'Update' : 'Submit'}}</button>
        </div>
    </AdminLayout>
</template>