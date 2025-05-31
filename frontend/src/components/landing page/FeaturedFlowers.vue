<template>
  <v-container class="h-[100vh] pa-4 flex flex-col justify-center items-start">
    <div class="text-2xl font-weight-bold mb-10">Find Perfect Flowers for Special Occassions</div>
    <div class="flex flex-wrap gap-4 justify-center">
        <Occassions  :occasion="occassion" v-for="(occassion, index ) in occassions" :key="index" />
    </div>
  </v-container>
</template>

<script setup lang="ts">
import Occassions from '../Occassions.vue';
import { occassions } from '@/assets/dummy-data';
</script>

<style>

</style>