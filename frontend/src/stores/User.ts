import { defineStore } from "pinia";
import { ref } from "vue";


export const useUserStore = defineStore('userStore', () => {
    const token = ref(localStorage.getItem('auth_token') ?? null );

    function setToken (newToken: string)  {
        localStorage.setItem('auth_token', newToken)
        token.value = newToken
    }

    return {
        token,
        setToken,
    }

}) 