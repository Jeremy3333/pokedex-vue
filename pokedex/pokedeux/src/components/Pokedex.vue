<template>
  <div class="pokedex">
    <div class="logocentre">
      <a href="/">
        <img src="../assets/img/pokedex.png" alt="pokedex" class="logo" />
      </a>
    </div>
    <p v-if="$store.getters.pokemons.pokemons == undefined" class="intro">
      bienvenu sur pokedeux un projet de pokedex créer afin de vous aider dans
      vos aventure nous ne disposons actuellement que de la première génération
      et avons quelque probleme avec des erreur sur la base de donnée nous
      allons travailler afin de vous donner plus de contenue plus juste en
      attendant nous sommes prenneur pour des idée d'amélioration pour le site
    </p>
    <button
      @click="welcome()"
      v-if="$store.getters.pokemons.pokemons == undefined"
      class="entrer"
    >
      entrer
    </button>
    <img
      v-if="$store.getters.pokemons.pokemons == undefined"
      src="../assets/img/pokedex.webp"
      class="pokedeximg"
    />
    <input
      v-if="$store.getters.pokemons.pokemons != undefined"
      v-model="search"
      placeholder="search"
      class="search"
    />
    <tr v-if="$store.getters.pokemons.pokemons != undefined">
      <th>name</th>
      <th>types</th>
      <th>image</th>
      <th>show more</th>
    </tr>
    <div>
      <tr
        v-for="(pokemon, index) in $store.getters.pokemons.pokemons"
        :key="index"
      >
        <div
          v-if="
            search == '' ||
              pokemon.name.includes(search) ||
              pokemon.types.type1.includes(search) ||
              pokemon.types.type2.includes(search)
          "
        >
          <td>{{ pokemon.name }}</td>
          <td>
            <img
              :src="imgtype(pokemon.types.type1)"
              v-bind:alt="pokemon.type1"
              class="impok"
            />
            <br />
            <img
              :src="imgtype(pokemon.types.type2)"
              v-bind:alt="pokemon.type2"
              class="impok"
            />
          </td>
          <td>
            <img
              :src="img(pokemon.image)"
              v-bind:alt="pokemon.nom_pok"
              class="impok"
            />
          </td>
          <td><button @click="show(pokemon.id)">show</button></td>
        </div>
      </tr>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      pokemons: this.$store.getters.pokemon,
      search: ""
    };
  },
  methods: {
    img(index) {
      return require("../assets/img/" + index);
    },
    imgtype(index) {
      if (index != "") {
        return require("../assets/img/" + index + ".png");
      }
    },
    gettruc() {
      this.$store.commit("GetPokedex");
    },
    show(index) {
      window.location.href = "/" + index;
    },
    welcome() {
      console.log(this.$store.getters.pokemons.pokemons);
      this.$store.commit("GetPokedex");
    }
  },
  Mounted() {
    this.gettruc();
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
* {
  margin: 0;
  padding: 0;
  color: white;
}
.search {
  width: 45%;
}
input {
  color: black;
  margin: 5px;
  margin-left: 50%;
  transform: translate(-50%);
}
.entrer {
  margin-left: 50%;
  transform: translate(-50%);
}
.intro {
  text-align: center;
  width: 50%;
  margin-left: 50%;
  transform: translate(-50%);
}
.pokedeximg {
  width: 60%;
  margin-left: 50%;
  transform: translate(-50%);
}
.logo {
  width: 100%;
}
.logocentre {
  display: flex;
  justify-content: center;
}
.logocentre a {
  width: 20%;
  display: flex;
  justify-content: center;
}
body {
  width: 100%;
}
tr {
  text-align: center;
  transform: translate(450px);
}
button {
  color: black;
}
th {
  padding: 5px;
  width: 200px;
}
td {
  padding: 5px;
  width: 202px;
}
.impok {
  width: 70px;
}
</style>
