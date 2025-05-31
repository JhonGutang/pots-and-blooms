<template>
  <div class="py-5 px-10 flex fixed top-0 justify-between w-[100vw] items-center z-99 bg-white">
    <div class="text-3xl font-bold title">Pots and Blooms</div>
    <div class="flex">
      <router-link :to="navLink.link" v-for="(navLink, index ) in navlinks" :key="index" >
        <v-btn variant="text" size="small">
        {{ navLink.label }}
      </v-btn>
        
      </router-link>
    </div>
  </div>
</template>

<script setup lang="ts">
const navlinks = [
  {
    label: "Home",
    link: "/landing-page",
  },
  {
    label: "Flowers",
    link: "/flowers",
  },
  {
    label: "About Us",
    link: "#",
  },
  {
    label: "Contact Us",
    link: "#",
  },{
    label: "Login",
    link: "/auth",
  },
];
</script>

<style scoped>
.title {
    font-family:'Times New Roman', Times, serif
}
</style>
