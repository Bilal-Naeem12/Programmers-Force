<script>
export default {
  name: 'Button',
}
</script>

<template>
  <div class="btn">
    <slot></slot>
  </div>
</template>

<style scoped>
.btn {
  background-color: orange;
  padding: 4px 2px;

  color: black;
}
</style>
