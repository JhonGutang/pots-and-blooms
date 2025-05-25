<template>
  <AuthLayout>
    <template #content>
        <form @submit.prevent="handleRegister" class="w-[100%] max-h-[100%] px-3 overflow-y-auto">
            <div class="form-group" v-for="(input, index) in inputs" :key="index">
                <label :for="input.model">{{ input.label }}</label>
                <input :type="input.type" :name="input.model" :id="input.model">
            </div>
            <input type="submit" value="Register" class="w-[100%] py-3 bg-pink-500 text-white rounded-lg">
        </form>
    </template>
  </AuthLayout>
</template>

<script setup lang="ts">
import AuthLayout from '@/layout/AuthLayout.vue';

const inputs = [
    {model: 'username', label: 'Username', type: 'text'},
    {model: 'fullName', label: 'Full Name', type: 'text'},
    {model: 'address', label: 'Address', type: 'text'},
    {model: 'email', label: 'Email', type: 'email'},
    {model: 'phoneNumber', label: 'Phone Number', type: 'number'},
    {model: 'password', label: 'Password', type: 'password'},
    {model: 'confirmPassword', label: 'Confirm Password', type: 'password'},
    
]

const handleRegister = () => {
    console.log('registering');
}
</script>

<style>

</style>