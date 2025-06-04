<template>
  <v-container fluid class="form-container">
    <v-card class="flower-form-card">
      <v-card-title class="title">
        🌸 Post a Flower
      </v-card-title>

      <v-card-text>
        <v-form @submit.prevent>
          <v-text-field label="Name" prepend-inner-icon="mdi-flower" variant="outlined" density="comfortable"
            class="mb-4" />

          <v-text-field label="Description" prepend-inner-icon="mdi-text" variant="outlined" density="comfortable"
            class="mb-4" />

          <v-text-field label="Price" prepend-inner-icon="mdi-currency-usd" type="number" variant="outlined"
            density="comfortable" class="mb-4" />

          <v-file-input label="Upload Image" prepend-inner-icon="mdi-image" variant="outlined" density="comfortable"
            class="mb-6" prepend-icon="" />

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
