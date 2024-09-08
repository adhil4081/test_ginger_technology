<script setup>
    import { ref } from 'vue'

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
            <div class="col-span-1 h-full">
                <div class="bg-gray-300 p-10 h-full space-y-10">
                    <button @click="changeMenu('dashboard')" class="rounded-lg bg-white px-2 w-full"
                        :class="(selectedMenu == 'dashboard') ? 'bg-black text-white' :'bg-white' ">Dashboard</button>
                    <button @click="changeMenu('category')" class="rounded-lg px-2 w-full"
                        :class="(selectedMenu == 'category') ? 'bg-black text-white' :'bg-white' ">Category</button>
                    <button @click="changeMenu('product')" class="rounded-lg px-2 w-full"
                        :class="(selectedMenu == 'product') ? 'bg-black text-white' :'bg-white' ">Product</button>
                </div>
            </div>
            <!-- display bar -->
            <div class="col-span-4">
                <div v-if="(selectedMenu == 'dashboard')" class=""> dashboard</div>
                <div v-if="(selectedMenu == 'category')" class=""> category crud</div>
                <div v-if="(selectedMenu == 'product')" class=""> product crud</div>
            </div>
        </div>
    </div>
</template>