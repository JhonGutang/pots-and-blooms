<template>
  <v-container fluid class="form-container">
    <v-card class="flower-form-card">
      <v-card-title class="title">
        🌸 Post a Flower
      </v-card-title>

      <v-card-text>
        <v-form @submit.prevent="submit">
          <v-text-field label="Name" v-model="postFlower.name" prepend-inner-icon="mdi-flower" variant="outlined"
            density="comfortable" class="mb-4" />

          <v-textarea label="Description" v-model="postFlower.description" prepend-inner-icon="mdi-text"
            variant="outlined" density="comfortable" class="mb-4" />

          <v-text-field label="Price" v-model="postFlower.price" prepend-inner-icon="mdi-currency-usd" type="number"
            variant="outlined" density="comfortable" class="mb-4" />

          <v-file-input label="Upload Image" prepend-inner-icon="mdi-image" variant="outlined" density="comfortable"
            class="mb-6" prepend-icon="" v-model="postFlower.imageFile" :show-size="true" accept="image/*" />

          <div class="button-group">
            <v-btn type="submit" color="pink-darken-1" height="45" block class="text-white">
              🌷 Post Flower
            </v-btn>

            <router-link to="/admin/dashboard" class="router-link">
              <v-btn type="button" variant="tonal" color="grey-lighten-1" height="45" block>
                Cancel
              </v-btn>
            </router-link>

          </div>
        </v-form>
      </v-card-text>
    </v-card>
  </v-container>
</template>

<script setup lang="ts">
import { flowerService } from '@/services/flowerService';
import type { FlowerType } from '@/types/flower';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const { storeFlower } = flowerService()
const router = useRouter()
const postFlower = ref < FlowerType > ({
  name: '',
  description: '',
  price: 0,
  imageFile: null,
})

const submit = async () => {
  const formData = new FormData();
  formData.append('name', postFlower.value.name);
  formData.append('description', postFlower.value.description);
  formData.append('price', postFlower.value.price.toString())

  if (postFlower.value.imageFile) {
    formData.append('image', Array.isArray(postFlower.value.imageFile) ? postFlower.value.imageFile[0] : postFlower.value.imageFile);
  }

  try {
    await storeFlower(formData);
    setTimeout(() => {
      router.push('/admin/dashboard');
    }, 1500);
  } catch (error) {
    console.error(error);
  }

}

</script>

<style scoped>
.form-container {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(to right top, #ffe4ec, #ffe9f0, #fff6f9);
  padding: 0;
}

.flower-form-card {
  width: 100%;
  max-width: 500px;
  padding: 24px;
  border-radius: 16px;
  background-color: rgba(255, 255, 255, 0.85);
  backdrop-filter: blur(10px);
  box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
}

.title {
  font-size: 1.5rem;
  font-weight: 600;
  text-align: center;
  margin-bottom: 24px;
  color: #d81b60;
}

.button-group {
  display: flex;
  flex-direction: column;
  gap: 16px;
}
</style>
