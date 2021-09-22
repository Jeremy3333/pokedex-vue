<template>
  <div class="pokedex">
    <tr>
      <th>numbre</th>
      <th>name</th>
      <th>types</th>
      <th>image</th>
    </tr>
    {{ test }}
    <tr v-for="(pokemon, index) in pokemons.pokemons" :key="index" @click="show(pokemon.id)">
      <td>{{ pokemon.id }}</td>
      <td>{{ pokemon.name }}</td>
      <td>
        {{ pokemon.types.type1 }}
        <br>
        {{ pokemon.types.type2 }}
      </td>
      <td><img :src="img(pokemon.image)" v-bind:alt="pokemon.nom_pok"></td>
    </tr>
  </div>
</template>
<script>
export default {
  data() {
    return {
      pokemons: "",
      test: "",
    }
  },
  methods: {
    get () {
      var requestOptions = {
        method: 'GET',
        redirect: 'follow'
      };

      fetch("http://localhost:8000/api/pokemons", requestOptions)
        .then(response => response.text())
        .then(result => console.log(this.pokemons = JSON.parse(result)))
        .then(result => console.log(this.test = result))
        .catch(error => console.log('error', error));
    },
    img(index){
      return require('../assets/img/'+index)
    },
    show(index) {
      window.location.href = "#/"+index
    }
  },
    beforeMount() {
        this.get()
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
* {
  margin: 0;
  padding: 0;
}
body {
  width: 100%;
}
tr {
  text-align: center;
}
th  {
    border: 2px solid black;
    padding: 5px;
}
td {
    border: 1px solid black;
    padding: 5px;
}
img {
  width: 50px;
}
</style>
