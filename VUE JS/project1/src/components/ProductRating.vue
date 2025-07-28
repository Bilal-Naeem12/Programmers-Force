<template>
  <div class="flex items-center gap-1">
    <span
      v-for="i in 5"
      :key="i"
      class="text-yellow-400"
    >
      <span v-if="i <= Math.round(rating)">★</span>
      <span v-else>☆</span>
    </span>
    <span class="text-xs text-gray-500">({{ rating }})</span>
  </div>
</template>

<script setup>
defineProps({
  rating: Number
})
</script>
