<script setup>
import Modal from "@/Components/Modal.vue";
import axios from "axios";
import { ref } from "vue";

const show = ref(false);
const product = ref();

function showModal(data) {
  show.value = true;
  product.value = data;
}

function close() {
  show.value = false;
}

function addToCart(data) {

  axios.post(route('add_to_cart', { 'id': data })).then((response) => {
    window.alert(response.data)
    show.value = false;

  }).catch((err) => {
    window.alert("Something went wrong")
    show.value = false;
  })

}

defineExpose({
  showModal,
});
</script>

<template>
  <div class="flex">
    <Modal :maxWidth="'md'" :show="show" class="flex justify-between">
      <button @click="close()" class="text-red-500 p-5 w-full text-end">X</button>
      <p class="mt-2 text-center">ID : {{ product?.id }}</p>
      <p class="mt-2 text-center">Name : {{ product?.name }}</p>
      <p class="mt-2 text-center">Category : {{ product?.category?.name }}</p>
      <p class="mt-2 text-center">Description : {{ product?.description }}</p>
      <div class="mt-5 w-full flex pb-5 justify-center space-x-2">
        <button @click="addToCart(product?.id)" class="p-2 block rounded-md border border-black">Add to cart</button>
        <button @click="close()" class="p-2 block rounded-md border border-red-500 text-red-500">close</button>
      </div>
    </Modal>
  </div>
</template>
