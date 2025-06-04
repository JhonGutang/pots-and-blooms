import { createRouter, createWebHistory } from "vue-router";
import LandingPage from "../views/LandingPage.vue";
import Login from "@/views/auth/Login.vue";
import Register from "@/views/auth/Register.vue";
import Flowers from "@/views/FlowerSection.vue";
import NotAuthorized from "@/views/NotAuthorized.vue";
import Dashboard from "@/views/admin/Dashboard.vue";
import PostFlower from "@/views/admin/PostFlower.vue";
import { useUserStore } from "@/stores/User";
import Home from "@/views/Home.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/landing-page",
      name: "Landing Page",
      component: LandingPage,
    },
    {
      path: "/auth",
      name: "Auth",
      component: Login,
      beforeEnter: (to, from, next) => {
        const token = useUserStore().token;
        if (token) {
          console.log("you are already logged in");
          alert("already logged in");
          next("/");
        } else {
          console.log("still not logged in?");
          next();
        }
      },
    },
    {
      path: "/auth-registration",
      name: "Auth-Registration",
      component: Register,
    },
    { path: "/flowers", name: "Flowers", component: Flowers },
    {
      path: "/not-authorized",
      name: "Not Authorized",
      component: NotAuthorized,
    },
    {
      path: "/",
      name: "Home",
      component: Home,
      beforeEnter: (to, from, next) => {
        const token = useUserStore().token;

        if (token) {
          next();
        } else {
          next("/auth");
        }
      },
    },
    {
      path: "/admin/dashboard",
      name: "Admin Dashboard",
      component: Dashboard,
    }, {
      path: "/admin/post-flower",
      name: "Admin Post Flower",
      component: PostFlower,
    }
  ],
});

export default router;
