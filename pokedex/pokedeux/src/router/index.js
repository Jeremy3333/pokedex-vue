import Vue from "vue";
import VueRouter from "vue-router";
import Show from "../components/Show";
import Pokedex from "../components/Pokedex";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Pokedex",
    component: Pokedex
  },
  {
    path: "/:id",
    name: "Show",
    component: Show
  }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;
