<template>
    <v-container>
        <div class="text-h5 mb-10">Dashboard</div>
        <Analytics />
        <v-container>
            <v-tabs v-model="tab" bg-color="pink-lighten-2" class="rounded-lg">
                <v-tab value="flower display">Items</v-tab>
                <v-tab value="two">Orders</v-tab>
                <v-tab value="three">Logs</v-tab>
            </v-tabs>

            <div>
                <FlowerDisplay v-if="tab === 'flower display'"/>
            </div>
        </v-container>
    </v-container>

</template>


<script setup lang="ts">
import Analytics from '@/components/admin/Analytics.vue';
import FlowerDisplay from '@/components/admin/FlowerDisplay.vue';

import { ref } from 'vue';
const tab = ref('flower display');
</script>

<style></style>