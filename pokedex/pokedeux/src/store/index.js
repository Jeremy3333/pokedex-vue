import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    pokemons: ""
  },
  mutations: {
    GetPokedex() {
      var requestOptions = {
        method: "GET",
        redirect: "follow"
      };

      fetch("http://localhost:8000/api/pokemons", requestOptions)
        .then(response => response.text())
        .then(result => this.commit("GetPokemons", result))
        .catch(error => console.log("error", error));
    },
    GetPokemons(state, index) {
      state.pokemons = JSON.parse(index);
    }
  },
  actions: {},
  modules: {},
  getters: {
    pokemons: state => state.pokemons
  }
});
