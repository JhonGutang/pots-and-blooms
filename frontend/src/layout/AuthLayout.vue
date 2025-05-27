<template>
  <div class="flex flex-col items-center">
    <div class="w-[100vw] py-5 px-8 flex justify-between items-center">
      <div class="text-2xl">Pots and Blossoms</div>
      <router-link to="/">Return Home</router-link>
    </div>
    <v-card class="w-[35vw] pa-10">
      <slot name="content"></slot>
    </v-card>
    
  </div>
</template>

<script setup></script>

<style></style>
