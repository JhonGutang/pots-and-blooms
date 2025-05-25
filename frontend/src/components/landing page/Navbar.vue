<template>
  <div class="py-5 px-5 flex fixed top-0 justify-between w-[100vw] items-center">
    <div class="text-2xl font-bold title">Pots and Blooms</div>
    <div class="flex">
      <router-link :to="navLink.link" v-for="(navLink, index ) in navlinks" :key="index" class="hover:bg-pink-500 hover:text-white hover:rounded-xl px-3 py-2 px-4">
        {{ navLink.label }}
      </router-link>
    </div>
  </div>
</template>

<script setup lang="ts">
const navlinks = [
  {
    label: "Home",
    link: "#",
  },
  {
    label: "Flowers",
    link: "#",
  },
  {
    label: "About Us",
    link: "#",
  },
  {
    label: "Contact Us",
    link: "#",
  },
];
</script>

<style scoped>
.title {
    font-family:'Times New Roman', Times, serif
}
</style>
