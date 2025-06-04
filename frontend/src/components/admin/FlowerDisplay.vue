<template>
    <v-container class=" h-[80vh]">
        <div class="text-body-1 font-weight-bold">Your Flowers</div>
        <v-container fluid class="pa-0 d-flex justify-center align-center h-25" v-if="flowers.length === 0">
            <div class="text-center">
                <div class="text-xl font-weight-bold mb-4">
                    No Flowers Posted yet
                </div>
                <router-link to="/admin/post-flower">

                    <v-btn variant="outlined">Post A Flower</v-btn>
                </router-link>
            </div>
        </v-container>
    </v-container>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const flowers = ref([]);
</script>