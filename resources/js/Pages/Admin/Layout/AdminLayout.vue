<script setup>
    import { ref } from 'vue'
    import { Link } from '@inertiajs/vue3'
    import Menu from './Menu.vue';
    const selectedMenu = ref('dashboard')

    function changeMenu(data) {
        selectedMenu.value = data
    }

</script>


<template>
    <div class="h-screen w-screen p-20">
        <h1 class="text-3xl font-bold text-center">Admin Panel</h1>
        <div class="w-full grid grid-cols-5 gap-x-10 mt-10 h-[80vh]">
            <!-- menu bar -->
            <div class="col-span-1">
                <Menu />
            </div>
            <!-- display bar -->
            <div class="col-span-4">
                <slot />
            </div>
        </div>
    </div>
</template>