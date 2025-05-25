<template>
  <div class="flex flex-col items-center">
    <div class="w-[100vw] py-5 px-8 flex justify-between items-center">
      <div class="text-2xl">Pots and Blossoms</div>
      <router-link to="/">Return Home</router-link>
    </div>
    <div class="w-[35vw] border border-pink-800 py-5 px-3 rounded-lg  h-[80vh] flex items-center shadow-xl">
      <slot name="content"></slot>
    </div>
  </div>
</template>

<script setup></script>

<style></style>
