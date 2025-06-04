import type { CustomerLoginType, CustomerRegisterType } from "@/types/Customer";
import axios from "axios";

export const authService = () => {
  const login = async (userCredentials: CustomerLoginType) => {
    return await axios.post("login", userCredentials);
  };

  const register = async (customerData: CustomerRegisterType) => {
    const response = await axios.post("customers", customerData);
    return response.data
  };

  return {
    login,
    register,
  };
};
