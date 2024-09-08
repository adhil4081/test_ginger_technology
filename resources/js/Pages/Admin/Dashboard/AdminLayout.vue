<script setup>
import Menu from './Menu.vue';
</script>


<template>
    <div class="h-screen w-screen p-20">
        <div class="w-full grid grid-cols-5">
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