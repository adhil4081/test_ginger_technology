<script setup>
    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue'
    import { Link,router } from '@inertiajs/vue3';

    const props = defineProps({
        categories: Object
    })

    function edit(id) {
        router.get(route('admin:categories.edit', id))
    }

    function deleteItem(id) {
        router.delete(route('admin:categories.destroy', id))

    }

</script>


<template>
    <AdminLayout>
        <div class="flex justify-between w-full">
            <h1 class="text-3xl text-nowrap font-medium">Categories</h1>
            <Link :href="route('admin:categories.create')" class="p-2 px-4 rounded-lg bg-blue-400 text-white"> Add
            </Link>
        </div>
        <div class="mt-5 ">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in categories" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{item.id}}
                            </td>
                            <td class="px-6 py-4">
                                {{item.name}}
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <button @click="edit(item.id)"
                                    class="border border-white rounded-md px-4 p-2">Edit</button>
                                <button @click="deleteItem(item.id)"
                                    class="border border-white rounded-md p-2">Delete</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </AdminLayout>
</template>