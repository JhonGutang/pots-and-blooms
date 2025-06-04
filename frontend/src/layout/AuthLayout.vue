<template>
  <v-container class="px-0">
    <div class="px-8 flex justify-between  items-center">
      <div class="text-2xl">Pots and Blossoms</div>
      <router-link to="/landing-page">
        <v-btn variant="text">
          Return Home
        </v-btn>
      </router-link>
    </div>
    <v-container height="700" class="d-flex justify-center align-center">
      <v-card class="w-[35vw] pa-10 rounded-lg" elevation="7">
        <slot name="content"></slot>
      </v-card>

    </v-container>

  </v-container>
</template>

<script setup></script>

<style></style>
