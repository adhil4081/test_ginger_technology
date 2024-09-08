<script setup>
    import { usePage, Link } from '@inertiajs/vue3';

    const page = usePage();


</script>

<template>
    <div class="bg-gray-300 p-10 h-full space-y-10">
        <Link :href="route('admin:dashboard')" class="rounded-lg px-2 text-center w-full block"
            :class="page.url.includes('dashboard') ? 'bg-black text-white' :'bg-white' ">Dashboard</Link>
        <Link :href="route('admin:categories.index')" class="rounded-lg block text-center px-2 w-full"
            :class="page.url.includes('categories') ? 'bg-black text-white' :'bg-white' ">Categories</Link>
        <Link :href="route('admin:products.index')" class="rounded-lg block text-center px-2 w-full"
            :class="page.url.includes('products') ? 'bg-black text-white' :'bg-white' ">Products</Link>
    </div>
</template>