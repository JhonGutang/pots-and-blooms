<template>
    <v-card width="280" height="400" class="rounded-lg" elevation="5"> 
        <v-img class="h-[70%] border  "></v-img>
        <div class="pa-4 ">

            <div class="text-lg font-bold">{{props.occasion.name}}</div>
        </div>
    </v-card>
</template>

<script setup lang="ts">
import type { OccassionsType } from '@/types/flower';
const props = defineProps<{occasion: OccassionsType}>()

</script>

<style>

</style>