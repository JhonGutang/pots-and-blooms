import { ref } from "vue";

export const useSnackbar = () => {
  const snackbar = ref({
    show: false,
    status: "green",
    message: "",
  });

  const triggerSnackbar = (message: string, status: "green" | "error") => {
    snackbar.value = {
      show: true,
      status,
      message,
    };
  };

  return {
    snackbar,
    triggerSnackbar
  }
};
