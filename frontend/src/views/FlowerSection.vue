<template>
  <div>
    <Navbar />
    <div class="pt-15 mt-3">
    <div class="text-3xl text-center mb-8">Flowers</div>
    <div class="flex flex-wrap gap-5 justify-center">
      <div v-for="(flower, index) in flowers" :key="index">
        <Flower :flower="flower" />
      </div>
    </div>  
    </div>
    
  </div>
</template>

<script setup lang="ts">
import Flower from "@/components/Flower.vue";
import { flowers } from "@/assets/dummy-data";
import Navbar from "@/components/landing page/Navbar.vue";
</script>

<style></style>
