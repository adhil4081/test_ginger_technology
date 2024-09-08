<script setup>
  import DetailModal from "@/Pages/User/Listings/DetailModal.vue";
  import { ref } from "vue";
  const props = defineProps({
    products: Object
  })
  console.log(props.products);

  const detailModal = ref();

  const cartProducts = ref()

  function showDetail(data) {
    detailModal.value.showModal(data);
  }

  function sendDetails() {
    axios.get(route('send_detail')).then((response) => {
      console.log(response.data);

    })
    // let phoneNumber = '9061754081';
    // let message = 'hiii';
    // let whatsappUrl = `https://wa.me/${phoneNumber}/?text=${encodeURIComponent(message)}`;
    // window.open(whatsappUrl, '_blank');

  }
</script>

<template>
  <div class="h-screen w-screen p-20">
    <p class="text-center text-2xl font-bold">Listings</p>

    <div class="grid grid-cols-4 mt-5 bg-white gap-10">
      <button v-for="product in products" @click="showDetail(product)"
        class="h-56 w-46 border rounded-lg border-black p-2">
        <div class="w-full h-[80%] border border-green-200">
          <img :src="product?.image_url" class="h-full w-full" alt="">
        </div>
        <div class="w-full flex justify-between mt-5">
          <p>{{product?.name}}</p>
          <p> {{product?.category?.name}} </p>
        </div>
      </button>
    </div>

    <button @click="sendDetails()" class="mt-5 text-center w-fit mx-auto py-2 px-10 rounded-lg bg-green-300">Send Cart
      in Whatsapp</button>
  </div>
  <DetailModal ref="detailModal" />
</template>