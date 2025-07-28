<script setup>
import ProductList from '@/components/ProductList.vue'

import { ref } from 'vue'
const collapsed = ref(false)
const showCategory = ref(true)
const showBrand = ref(true)
const showPrice = ref(true)

const categories = ['Beauty', 'Skincare', 'Hair']
const brands = ['Essence', 'Maybelline', 'Dior']
</script>

<template> 
  <main class="p-6 flex flex-col md:flex-row">
    
     <aside
    :class="[
      'transition-all duration-300 ease-in-out h-full sticky top-10 bg-white border-r border-gray-200 shadow-sm p-4 mr-5',
      collapsed ? 'w-16' : 'w-full '
    ]"
  >
    <!-- Collapse Button -->
    <button
      @click="collapsed = !collapsed"
      class="mb-4 flex items-center justify-center text-gray-500 hover:text-pink-600 w-8 h-8 rounded-full border border-gray-300 hover:border-pink-600 transition"
    >
      <span v-if="collapsed">›</span>
      <span v-else>‹</span>
    </button>

    <!-- Filters (hide labels when collapsed) -->
    <div v-if="!collapsed" class="space-y-8">
      <!-- Category Filter -->
      <div>
        <h3 class="text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wider">Category</h3>
        <ul class="space-y-2">
          <li v-for="cat in categories" :key="cat">
            <label class="flex items-center space-x-2 text-sm text-gray-600">
              <input type="checkbox" class="accent-pink-600 rounded" />
              <span>{{ cat }}</span>
            </label>
          </li>
        </ul>
      </div>

      <!-- Brand Filter -->
      <div>
        <h3 class="text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wider">Brand</h3>
        <ul class="space-y-2">
          <li v-for="brand in brands" :key="brand">
            <label class="flex items-center space-x-2 text-sm text-gray-600">
              <input type="checkbox" class="accent-pink-600 rounded" />
              <span>{{ brand }}</span>
            </label>
          </li>
        </ul>
      </div>

      <!-- Price Filter -->
      <div>
        <h3 class="text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wider">Price Range</h3>
        <div class="flex items-center space-x-3">
          <input type="range" min="0" max="100" class="w-full accent-pink-600" />
          <span class="text-xs text-gray-500">Up to $100</span>
        </div>
      </div>
    </div>
  </aside>
    
  <div class=""><h1 class="text-2xl font-bold mb-4">Shop Products</h1>

    <ProductList />
    </div>
  </main>
</template>

