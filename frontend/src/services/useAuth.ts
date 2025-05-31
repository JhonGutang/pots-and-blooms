import type { CustomerType } from "@/types/Customer";
import axios from "axios";


export const loginAttempt = async( userCredentials: CustomerType) => {
        return await axios.post('login', userCredentials);
}