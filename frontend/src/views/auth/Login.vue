<template>
    <AuthLayout>
        <template #content>
            <div class="text-2xl mb-3">Login to look for beautiful Flowers</div>
            <form action="post" @submit.prevent="handleSubmit" class="w-[100%] p-10">
                <div class="form-group">
                    <v-text-field variant="outlined" label="Username / Email" density="comfortable" type="text"
                        v-model="userCredentials.usernameOrEmail" placeholder="johndoe@gmail.com / johndoe123" required/>
                </div>
                <div class="form-group">
                    <v-text-field variant="outlined" label="Password" density="comfortable"
                        v-model="userCredentials.password" type="password" required></v-text-field>
                </div>
                <v-btn type="submit" block color="pink-lighten-1" size="large">Login</v-btn>
            </form>
            <small class="flex justify-center items-center mt-2">Dont have any account? <router-link
                    to="/auth-registration"><v-btn variant="text" size="small" density="compact">Register
                        Now</v-btn></router-link> </small>
            <v-snackbar v-model="snackbar.show" :timeout="2500" :color="snackbar.status" location="top right">
                {{ snackbar.message }}
            </v-snackbar>
        </template>

    </AuthLayout>
</template>

<script setup lang="ts">
import AuthLayout from '@/layout/AuthLayout.vue';
import { useUserStore } from '@/stores/User';
import type { CustomerType } from '@/types/Customer';
import { loginAttempt } from '@/services/useAuth';
import { useSnackbar } from '@/composables/useSnackbar';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();
const userStore = useUserStore();
const {snackbar, triggerSnackbar} = useSnackbar()


const userCredentials = ref<CustomerType>({
    "usernameOrEmail": "",
    "password": "",
})

const handleSubmit = async () => {
    try {
        const response = await loginAttempt(userCredentials.value);
        userStore.setToken(response.data.token)
        triggerSnackbar('Logged In Successfully', 'green')
        setTimeout(() => {
            router.push('/');
        }, 3000);
    } catch (error) {
        console.error(error);
        triggerSnackbar('Logged In Failed: Invalid Credentials', 'error')
    }
}


</script>

<style scoped></style>