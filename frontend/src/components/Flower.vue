<template>
  <v-card width="300" height="340" elevation="4" rounded>
    <v-img
      alt="this is an image"
      class="border border-black"
      height="230"
    ></v-img>
    <div class="pa-3">
      <div class="text-2xl font-bold mb-4">
        {{ props.flower.name }}
      </div>
      <div class="text-end text-lg font-weight-bold">
        {{ props.flower.price }}.00
      </div>
    </div>
  </v-card>
</template>

<script setup lang="ts">
import type { FlowerType } from "@/types/flower";

const props = defineProps<{ flower: FlowerType }>();
</script>

<style></style>
