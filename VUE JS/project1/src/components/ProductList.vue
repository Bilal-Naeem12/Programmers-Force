<script setup>
import { onMounted, ref } from 'vue';
import ProductCard from './ProductCard.vue'
import productsJson from '@/dummy/products.json'
import axios from 'axios';
import { useProductStore } from '@/stores/useProductStore';

const productStore = useProductStore()
onMounted(()=>{
    productStore.fetchAllProducts()
})
const loading = ref(false)
</script>

<template>
  <div
    class="flex flex-wrap gap-x-6 gap-y-8 justify-center"
  >
    <div
      v-for="product in productStore.products"
      :key="product.id"
      class="flex-grow basis-[220px] "
    >
      <ProductCard :product="product" />
    </div>
  </div>
</template>

