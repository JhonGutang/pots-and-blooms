<template>
  <AuthLayout>
    <template #content>
        <form action="post" @submit.prevent="handleSubmit" class="w-[100%] p-10">
            <div class="form-group">
                <label for="username">Username / Email</label>
                <input type="text" name="username" id="username" placeholder="johndoe@gmail.com / johndoe123">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <input type="submit" value="Login" class="bg-pink-500 w-[100%] py-3 rounded-lg text-white">
        </form>
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