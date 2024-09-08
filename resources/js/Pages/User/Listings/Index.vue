<script setup>
import DetailModal from "@/Pages/User/Listings/DetailModal.vue";
import { ref } from "vue";

const detailModal = ref();

function showDetail(params) {
  detailModal.value.showModal();
}
</script>

<template>
  <div class="h-screen w-screen p-20">
    <p class="text-center text-2xl font-bold">Listings</p>

    <div class="grid grid-cols-4 mt-5 bg-white gap-10">
      <button @click="showDetail()" class="h-56 w-46 border rounded-lg border-black p-2">
        <div class="w-full h-[50%] border border-green-200"></div>
        <div class="w-full flex justify-between mt-5">
          <p>Product name</p>
          <p>category name</p>
        </div>
      </button>
      <button @click="showDetail()" class="h-56 w-46 border rounded-lg border-black p-2">
        <div class="w-full h-[50%] border border-green-200"></div>
        <div class="w-full flex justify-between mt-5">
          <p>Product name</p>
          <p>category name</p>
        </div>
      </button>
      <button @click="showDetail()" class="h-56 w-46 border rounded-lg border-black p-2">
        <div class="w-full h-[50%] border border-green-200"></div>
        <div class="w-full flex justify-between mt-5">
          <p>Product name</p>
          <p>category name</p>
        </div>
      </button>
      <button @click="showDetail()" class="h-56 w-46 border rounded-lg border-black p-2">
        <div class="w-full h-[50%] border border-green-200"></div>
        <div class="w-full flex justify-between mt-5">
          <p>Product name</p>
          <p>category name</p>
        </div>
      </button>
    </div>
  </div>
  show: false,
  <DetailModal ref="detailModal" />
</template>
