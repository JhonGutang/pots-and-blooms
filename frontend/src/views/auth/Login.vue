<template>
  <AuthLayout>
    <template #content>
        <div class="text-2xl mb-3">Login to look for beautiful Flowers</div>
        <form action="post" @submit.prevent="handleSubmit" class="w-[100%] p-10">
            <div class="form-group">
                <label for="username">Username / Email</label>
                <v-text-field density="comfortable" type="text" name="username" id="username" placeholder="johndoe@gmail.com / johndoe123"/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <v-text-field density="comfortable" type="password" name="password" id="password"></v-text-field>
            </div>
            <v-btn type="submit" block color="pink-lighten-1" size="large">Login</v-btn>
        </form>
        <small class="flex justify-center items-center mt-2">Dont have any account? <router-link to="/auth-registration"><v-btn variant="text" size="small" density="compact">Register Now</v-btn></router-link> </small>
    </template>
  </AuthLayout>
</template>

<script setup lang="ts">
import AuthLayout from '@/layout/AuthLayout.vue';
const handleSubmit = () => {
    console.log('hello');
}
</script>

<style scoped>


</style>