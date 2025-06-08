<template>
    <v-container class=" h-[80vh]">
        <div class="d-flex justify-between align-center">
            <div class="text-body-1 font-weight-bold">Your Flowers</div>
            <router-link to="post-flower">
                <v-btn size="small" variant="outlined" color="pink lighten-5">Add Product</v-btn>

            </router-link>
        </div>
        <v-container fluid class="pa-0 d-flex justify-center align-center h-25" v-if="flowers.length < 0">
            <div class="text-center">
                <div class="text-xl font-weight-bold mb-4">
                    No Flowers Posted yet
                </div>
                <router-link to="/admin/post-flower">

                    <v-btn variant="outlined">Post A Flower</v-btn>
                </router-link>
            </div>
        </v-container>
        <v-container v-else class="d-flex ga-4">
            <v-card v-for="flower in flowers" :key="flower.id" width="300" height="280" class="pa-0 flower-card">
                <v-card-text class="pa-0">
                    <v-img :src="flower.image_path" width="100%" cover class="mb-2" />
                    <div>
                        {{ flower.name }}
                    </div>
                    <div class="flower-overlay d-flex flex-column d-flex justify-center pl-5">
                        <div class="text-h6 font-weight-bold mb-2">{{ flower.name }}</div>
                        <div class="mb-2">{{ flower.description }}</div>
                        <div class="text-subtitle-1 font-weight-bold">₱{{ flower.price }}</div>
                    </div>
                </v-card-text>
            </v-card>
        </v-container>
    </v-container>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { flowerService } from '@/services/flowerService';
const { fetchAllFlowers } = flowerService()
const flowers = ref([]);

onMounted(async () => {
    flowers.value = await fetchAllFlowers()
    console.log(flowers.value);
})
</script>

<style scoped>
.flower-card {
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.flower-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.96);
    opacity: 0;
    transition: opacity 0.3s;
    z-index: 2;
    pointer-events: none
}

.flower-card:hover .flower-overlay {
    opacity: 1;
    pointer-events: auto;
}
</style>