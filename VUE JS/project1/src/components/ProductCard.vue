<script setup>
import ProductRating from './ProductRating.vue'
defineProps({ product: Object })



</script>

<template>
  
<router-link :to="{ name: 'product-detail', params: { id: product.id } }">
  <div
    class="group cursor-pointer bg-white rounded-xl max-w-[260px] p-3 overflow-hidden border border-gray-100 shadow hover:shadow-md transition-all duration-200"
    >
    <!-- Image box -->
    <div class="bg-gray-50 flex items-center justify-center rounded-lg">
      <img
        :src="product.images?.[0] || product.thumbnail"
        :alt="product.title"
        class="h-[150px] object-contain transition-transform duration-200 group-hover:scale-105"
      />
    </div>

    <!-- Info -->
    <div class="pt-3 space-y-1">
      <h2 class="text-sm font-semibold text-gray-900 truncate">
        {{ product.title }}
      </h2>
      <p class="text-xs text-gray-400">{{ product.brand }}</p>
      <ProductRating :rating="product.rating" />
      <p class="text-xs text-gray-500 line-clamp-2">{{ product.description }}</p>

      <div class="pt-2 flex items-center justify-between">
        <span class="text-sm font-bold text-pink-600">${{ product.price.toFixed(2) }}</span>
        <button class="bg-pink-600 text-white text-xs px-3 py-1 rounded-full hover:bg-pink-700">
          Add
        </button>
      </div>
    </div>
  </div>
  </router-link>
</template>

