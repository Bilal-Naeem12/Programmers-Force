<script setup>
import { ref, onMounted, watch } from 'vue'
import { useRoute } from 'vue-router'
import axios from 'axios'
import ProductList from '@/components/ProductList.vue'

const route = useRoute()
const product = ref({})
const loading = ref(true)

const fetchProduct = async (id) => {
  loading.value = true
  try {
    const res = await axios.get(`https://dummyjson.com/products/${id}`)
    product.value = res.data
    window.scrollTo({ top: 0, behavior: 'smooth' })
  } catch (e) {
    console.error('Fetch error:', e)
    product.value = null
  } finally {
    loading.value = false
  }
}

// ✅ like useEffect(() => {}, [])
onMounted(() => {
  fetchProduct(route.params.id)
})

// ✅ like useEffect(() => {}, [route.params.id])
watch(
  () => route.params.id,
  (newId, oldId) => {
    if (newId !== oldId) {
      fetchProduct(newId)
    }
  }
)
</script>
<template>

<main class=" space-y-10">
  <div v-if="product.title" class="max-w-6xl mx-auto p-6 grid md:grid-cols-2 gap-8 ">
    <!-- Image -->
    <div class="flex flex-col items-center justify-center">
      <img
        :src="product.images[0] || product.thumbnail"
        :alt="product.title"
        class="w-full max-w-sm object-contain rounded-lg shadow"
      />
    
    </div>

    <!-- Details -->
    <div class="space-y-4">
      <h1 class="text-2xl font-bold text-gray-800">{{ product.title }}</h1>
      <p class="text-gray-500">{{ product.description }}</p>

      <div class="text-pink-600 text-xl font-bold">
        ${{ product.price.toFixed(2) }}
        <span class="text-sm text-gray-400 line-through ml-2">
          ${{ (product.price * (1 + product.discountPercentage / 100)).toFixed(2) }}
        </span>
      </div>

      <div class="text-yellow-500 text-sm">
        ⭐ {{ product.rating }} / 5 ({{ product.reviews.length }} reviews)
      </div>

      <ul class="text-sm text-gray-600 space-y-1">
        <li><strong>Brand:</strong> {{ product.brand }}</li>
        <li><strong>SKU:</strong> {{ product.sku }}</li>
        <li><strong>Stock:</strong> {{ product.stock }}</li>
        <li><strong>Shipping:</strong> {{ product.shippingInformation }}</li>
        <li><strong>Warranty:</strong> {{ product.warrantyInformation }}</li>
        <li><strong>Return Policy:</strong> {{ product.returnPolicy }}</li>
      </ul>

      <button
        class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 mt-4 rounded-lg shadow"
      >
        Add to Cart
      </button>
    </div>
  </div>
<div v-else>
    Loading product...
  </div>
  <!-- Reviews -->
  <div class="max-w-4xl mx-auto mt-12">
    <h2 class="text-lg font-semibold mb-4 text-gray-800">Customer Reviews</h2>
    <div class="space-y-4">
      <div
        v-for="(review, index) in product.reviews"
        :key="index"
        class="p-4 bg-white border rounded shadow-sm"
      >
        <div class="flex items-center justify-between text-sm">
          <span class="font-semibold text-gray-700">{{ review.reviewerName }}</span>
          <span class="text-yellow-500">Rating: {{ review.rating }}⭐</span>
        </div>
        <p class="mt-2 text-gray-600 text-sm">{{ review.comment }}</p>
      </div>
    </div>
  </div>
  <div class=" max-w-5xl mx-auto">
 <ProductList/>
 </div>
 </main>
</template>