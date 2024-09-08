<script setup>
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";

const show = ref(false);

function showModal() {
  console.log("fiii");
  show.value = true;
}

function close() {
  show.value = false;
}

defineExpose({
  showModal,
});
</script>

<template>
  <div class="flex">
    <Modal :show="show" class="flex justify-between">
      <button @click="close()" class="text-red-500 p-5">X</button>
    </Modal>
  </div>
</template>
