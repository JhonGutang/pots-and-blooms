<template>
    <AuthLayout>
        <template #content>
            <form @submit.prevent="handleRegister" class="w-[100%] max-h-[100%] px-3 overflow-y-auto pt-3">
                <div class="form-group" v-for="(input, index) in inputs" :key="index">
                    <v-text-field v-model="customerData[input.model]" variant="outlined"
                        :type="showPasswords[input.model] ? 'text' : input.type" :label="input.label"
                        density="comfortable"
                        :append-inner-icon="input.type === 'password' ? (showPasswords[input.model] ? 'mdi-eye-off' : 'mdi-eye') : ''"
                        @click:append-inner="() => togglePasswordVisibility(input.model)"></v-text-field>

                </div>
                <v-btn type="submit" color="pink-lighten-1" block height="40">Register</v-btn>
                <small class="flex justify-center items-center mt-2">Dont have any account? <router-link
                        to="/auth"><v-btn variant="text" size="small" density="compact">Login
                            Now</v-btn></router-link> </small>
            </form>
        </template>
    </AuthLayout>
</template>

<script setup lang="ts">
import AuthLayout from '@/layout/AuthLayout.vue';
import type { CustomerRegisterType } from '@/types/Customer';
import { authService } from '@/services/authService';
import { ref } from 'vue';

const { register } = authService();

interface InputTypes {
    model: keyof CustomerRegisterType,
    label: string,
    type: string,
}

const showPasswords = ref<{ [key: string]: boolean }>({
    password: false,
    passwordConfirmation: false
});


const inputs = <InputTypes[]>[
    { model: 'fullName', label: 'Full Name', type: 'text' },
    { model: 'address', label: 'Address', type: 'text' },
    { model: 'email', label: 'Email', type: 'email' },
    { model: 'phoneNumber', label: 'Phone Number', type: 'string' },
    { model: 'password', label: 'Password', type: 'password' },
    { model: 'passwordConfirmation', label: 'Confirm Password', type: 'password' },

]

const customerData = ref<CustomerRegisterType>({
    username: "",
    fullName: "",
    address: "",
    email: "",
    phoneNumber: "",
    password: "",
    passwordConfirmation: ""
})

const togglePasswordVisibility = (field: string) => {
  if (field in showPasswords.value) {
    showPasswords.value[field] = !showPasswords.value[field];
  }
}

const handleRegister = async () => {
    const response = await register(customerData.value);
    console.log(response);
}
</script>

<style></style>