<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
  <nav class="navbar">
  <RouterLink to="/">  <div class="logo">MyApp</div></RouterLink>
    <ul class="nav-links">
      <li><RouterLink to="/">Project1</RouterLink></li>
      <li><RouterLink to="/store">Project2</RouterLink></li>
      <li><RouterLink to="/about">About</RouterLink></li>
      <li><RouterLink to="/contact">Contact</RouterLink></li>
    </ul>
  </nav>
</template>

<style scoped>
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #222;
  padding: 1rem 2rem;
  color: white;
}

.logo {
  font-weight: bold;
  font-size: 1.5rem;
}

.nav-links {
  list-style: none;
  display: flex;
  gap: 1.5rem;
  margin: 0;
  padding: 0;
}

.nav-links a {
  color: white;
  text-decoration: none;
}

.nav-links a:hover {
  text-decoration: underline;
}
</style>
