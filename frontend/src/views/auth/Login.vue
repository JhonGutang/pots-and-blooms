<template>
  <AuthLayout>
    <template #content>
        <div class="text-2xl mb-3">Login to look for beautiful Flowers</div>
        <form action="post" @submit.prevent="handleSubmit" class="w-[100%] p-10">
            <div class="form-group">
                <v-text-field variant="outlined" label="Username / Email" density="comfortable" type="text" v-model="userCredentials.usernameOrEmail" placeholder="johndoe@gmail.com / johndoe123"/>
            </div>
            <div class="form-group">
                <v-text-field variant="outlined" label="Password" density="comfortable" v-model="userCredentials.password" type="password"></v-text-field>
            </div>
            <v-btn type="submit" block color="pink-lighten-1" size="large">Login</v-btn>
        </form>
        <small class="flex justify-center items-center mt-2">Dont have any account? <router-link to="/auth-registration"><v-btn variant="text" size="small" density="compact">Register Now</v-btn></router-link> </small>
    </template>
  </AuthLayout>
</template>

<script setup lang="ts">
import AuthLayout from '@/layout/AuthLayout.vue';
import axios from 'axios';
import { ref } from 'vue';

const userCredentials = ref({
    "usernameOrEmail": null,
    "password": null,
})

const handleSubmit = async() => {

    try {
        const response = await axios.post('login', userCredentials.value);
        console.log(response.data);
    } catch (error) {
        console.error(error);
    }
}
</script>

<style scoped>


</style>