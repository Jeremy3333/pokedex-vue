<template>
  <div>
    <div class="logocentre">
      <a href="/">
        <img src="../assets/img/pokedex.png" alt="pokedex" class="logo" />
      </a>
    </div>
    <div class="select">
      <div class="header">
        <p>n°{{ pokemon.note.id }}</p>
        <h3>{{ pokemon.note.name }}</h3>
        <p>
          <img
            :src="imgtype(pokemon.note.types.type1)"
            v-bind:alt="pokemon.type1"
            class="type"
          />
          <img
            :src="imgtype(pokemon.note.types.type2)"
            v-bind:alt="pokemon.type2"
            class="type"
            v-if="pokemon.note.types.type2 != ''"
          />
        </p>
      </div>
      <div class="arro">
        <img
          src="../assets/img/long-arrow-left.png"
          class="arrow"
          @click="show(pokemon.note.id - 1)"
        />
        <img
          src="../assets/img/long-arrow-right.png"
          class="arrow"
          @click="show(pokemon.note.id + 1)"
        />
      </div>
      <div class="img">
        <img :src="img(pokemon.note.image)" v-bind:alt="pokemon.nom_pok" />
      </div>
      <div class="description">
        <h3>Description</h3>
        <p>{{ pokemon.note.description }}</p>
      </div>
      <button class="crie" @click="playPokemonCry(pokemon.note.id)">
        crie
      </button>
      <div class="stats">
        <h3 class="soustitre">Stats</h3>
        <tr class="trstats">
          <th>HP</th>
          <td>
            <div class="fondbarre">
              <div
                v-if="pokemon.note.stats.hp >= 114"
                class="barregreen"
                v-bind:style="{ width: pokemon.note.stats.hp + 'px' }"
              ></div>
              <div
                v-if="
                  pokemon.note.stats.hp < 114 && pokemon.note.stats.hp >= 76
                "
                class="barreyellow"
                v-bind:style="{ width: pokemon.note.stats.hp + 'px' }"
              ></div>
              <div
                v-if="pokemon.note.stats.hp < 76"
                class="barrered"
                v-bind:style="{ width: pokemon.note.stats.hp + 'px' }"
              ></div>
            </div>
          </td>
          <td>{{ pokemon.note.stats.hp }}</td>
        </tr>
        <tr class="trstats">
          <th>attack</th>
          <td>
            <div class="fondbarre">
              <div
                v-if="pokemon.note.stats.attack >= 114"
                class="barregreen"
                v-bind:style="{ width: pokemon.note.stats.attack + 'px' }"
              ></div>
              <div
                v-if="
                  pokemon.note.stats.attack < 114 &&
                    pokemon.note.stats.attack >= 76
                "
                class="barreyellow"
                v-bind:style="{ width: pokemon.note.stats.attack + 'px' }"
              ></div>
              <div
                v-if="pokemon.note.stats.attack < 76"
                class="barrered"
                v-bind:style="{ width: pokemon.note.stats.attack + 'px' }"
              ></div>
            </div>
          </td>
          <td>{{ pokemon.note.stats.attack }}</td>
        </tr>
        <tr class="trstats">
          <th>defense</th>
          <td>
            <div class="fondbarre">
              <div
                v-if="pokemon.note.stats.defense >= 114"
                class="barregreen"
                v-bind:style="{ width: pokemon.note.stats.defense + 'px' }"
              ></div>
              <div
                v-if="
                  pokemon.note.stats.defense < 114 &&
                    pokemon.note.stats.defense >= 76
                "
                class="barreyellow"
                v-bind:style="{ width: pokemon.note.stats.defense + 'px' }"
              ></div>
              <div
                v-if="pokemon.note.stats.defense < 76"
                class="barrered"
                v-bind:style="{ width: pokemon.note.stats.defense + 'px' }"
              ></div>
            </div>
          </td>
          <td>{{ pokemon.note.stats.defense }}</td>
        </tr>
        <tr class="trstats">
          <th>special attack</th>
          <td>
            <div class="fondbarre">
              <div
                v-if="pokemon.note.stats.special_attack >= 114"
                class="barregreen"
                v-bind:style="{
                  width: pokemon.note.stats.special_attack + 'px'
                }"
              ></div>
              <div
                v-if="
                  pokemon.note.stats.special_attack < 114 &&
                    pokemon.note.stats.special_attack >= 76
                "
                class="barreyellow"
                v-bind:style="{
                  width: pokemon.note.stats.special_attack + 'px'
                }"
              ></div>
              <div
                v-if="pokemon.note.stats.special_attack < 76"
                class="barrered"
                v-bind:style="{
                  width: pokemon.note.stats.special_attack + 'px'
                }"
              ></div>
            </div>
          </td>
          <td>{{ pokemon.note.stats.special_attack }}</td>
        </tr>
        <tr class="trstats">
          <th>special defense</th>
          <td>
            <div class="fondbarre">
              <div
                v-if="pokemon.note.stats.special_defense >= 114"
                class="barregreen"
                v-bind:style="{
                  width: pokemon.note.stats.special_defense + 'px'
                }"
              ></div>
              <div
                v-if="
                  pokemon.note.stats.special_defense < 114 &&
                    pokemon.note.stats.special_defense >= 76
                "
                class="barreyellow"
                v-bind:style="{
                  width: pokemon.note.stats.special_defense + 'px'
                }"
              ></div>
              <div
                v-if="pokemon.note.stats.special_defense < 76"
                class="barrered"
                v-bind:style="{
                  width: pokemon.note.stats.special_defense + 'px'
                }"
              ></div>
            </div>
          </td>
          <td>{{ pokemon.note.stats.special_defense }}</td>
        </tr>
        <tr class="trstats">
          <th>speed</th>
          <td>
            <div class="fondbarre">
              <div
                v-if="pokemon.note.stats.speed >= 114"
                class="barregreen"
                v-bind:style="{ width: pokemon.note.stats.speed + 'px' }"
              ></div>
              <div
                v-if="
                  pokemon.note.stats.speed < 114 &&
                    pokemon.note.stats.speed >= 76
                "
                class="barreyellow"
                v-bind:style="{ width: pokemon.note.stats.speed + 'px' }"
              ></div>
              <div
                v-if="pokemon.note.stats.speed < 76"
                class="barrered"
                v-bind:style="{ width: pokemon.note.stats.speed + 'px' }"
              ></div>
            </div>
          </td>
          <td>{{ pokemon.note.stats.speed }}</td>
        </tr>
      </div>

      <div class="weak">
        <h3 class="soustitre">weaknesses</h3>
        <tr class="trweak">
          <th><img src="../assets/img/bug.png" alt="bug" class="types" /></th>
          <td>{{ pokemon.note.weaknesses.bug }}</td>
        </tr>
        <tr class="trweak">
          <th><img src="../assets/img/dark.png" alt="dark" class="types" /></th>
          <td>{{ pokemon.note.weaknesses.dark }}</td>
        </tr>
        <tr class="trweak">
          <th>
            <img src="../assets/img/dragon.png" alt="dragon" class="types" />
          </th>
          <td>{{ pokemon.note.weaknesses.dragon }}</td>
        </tr>
        <tr class="trweak">
          <th>
            <img
              src="../assets/img/electric.png"
              alt="electric"
              class="types"
            />
          </th>
          <td>{{ pokemon.note.weaknesses.electric }}</td>
        </tr>
        <tr class="trweak">
          <th>
            <img src="../assets/img/fairy.png" alt="fairy" class="types" />
          </th>
          <td>{{ pokemon.note.weaknesses.fairy }}</td>
        </tr>
        <tr class="trweak">
          <th>
            <img src="../assets/img/fighting.png" alt="fight" class="types" />
          </th>
          <td>{{ pokemon.note.weaknesses.fight }}</td>
        </tr>
        <tr class="trweak">
          <th>
            <img src="../assets/img/fire.png" alt="fire" class="types" />
          </th>
          <td>{{ pokemon.note.weaknesses.fire }}</td>
        </tr>
        <tr class="trweak">
          <th>
            <img src="../assets/img/flying.png" alt="flying" class="types" />
          </th>
          <td>{{ pokemon.note.weaknesses.flying }}</td>
        </tr>
        <tr class="trweak">
          <th>
            <img src="../assets/img/ghost.png" alt="ghost" class="types" />
          </th>
          <td>{{ pokemon.note.weaknesses.ghost }}</td>
        </tr>
        <tr class="trweak">
          <th>
            <img src="../assets/img/grass.png" alt="grass" class="types" />
          </th>
          <td>{{ pokemon.note.weaknesses.grass }}</td>
        </tr>
        <tr class="trweak">
          <th>
            <img src="../assets/img/ground.png" alt="ground" class="types" />
          </th>
          <td>{{ pokemon.note.weaknesses.ground }}</td>
        </tr>
        <tr class="trweak">
          <th><img src="../assets/img/ice.png" alt="ice" class="types" /></th>
          <td>{{ pokemon.note.weaknesses.ice }}</td>
        </tr>
        <tr class="trweak">
          <th>
            <img src="../assets/img/normal.png" alt="normal" class="types" />
          </th>
          <td>{{ pokemon.note.weaknesses.normal }}</td>
        </tr>
        <tr class="trweak">
          <th>
            <img src="../assets/img/poison.png" alt="poison" class="types" />
          </th>
          <td>{{ pokemon.note.weaknesses.poison }}</td>
        </tr>
        <tr class="trweak">
          <th>
            <img src="../assets/img/psychic.png" alt="psychic" class="types" />
          </th>
          <td>{{ pokemon.note.weaknesses.psychic }}</td>
        </tr>
        <tr class="trweak">
          <th><img src="../assets/img/rock.png" alt="rock" class="types" /></th>
          <td>{{ pokemon.note.weaknesses.rock }}</td>
        </tr>
        <tr class="trweak">
          <th>
            <img src="../assets/img/steel.png" alt="steel" class="types" />
          </th>
          <td>{{ pokemon.note.weaknesses.steel }}</td>
        </tr>
        <tr class="trweak">
          <th>
            <img src="../assets/img/water.png" alt="water" class="types" />
          </th>
          <td>{{ pokemon.note.weaknesses.water }}</td>
        </tr>
      </div>

      <div class="evos">
        <h3 class="soustitre">evolutions</h3>
        <div
          class="evo"
          v-for="(evolution, index) in pokemon.note.evolutions"
          :key="index"
        >
          <div v-for="(evo, index) in evos.pokemons" :key="index">
            <div v-if="evolution.evolution.evolution_id == evo.id" class="evol">
              <h4>{{ evo.name }}</h4>
              <img :src="img(evo.image)" v-bind:alt="evo.name" />
              <div v-if="evolution.evolution.required_lvl > 0">
                evolve at level {{ evolution.evolution.required_lvl }}
              </div>
              <div v-if="evolution.evolution.required_lvl == -1">
                evolve with an object
              </div>
              <div v-if="evolution.evolution.required_lvl == -2">
                evolve with a trading
              </div>
              <button @click="show(evo.id)" class="butevo">
                show
              </button>
            </div>
          </div>
          <br />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      pokemon: "",
      evos: "",
      result: ""
    };
  },
  methods: {
    get() {
      var requestOptions = {
        method: "GET",
        redirect: "follow"
      };

      fetch(
        "http://localhost:8000/api/pokemons/" + this.$route.params.id,
        requestOptions
      )
        .then(response => response.text())
        .then(resulte => console.log((this.pokemon = JSON.parse(resulte))))
        .catch(error => console.log("error", error));
    },
    getevo() {
      var requestOptions = {
        method: "GET",
        redirect: "follow"
      };

      fetch("http://localhost:8000/api/pokemons/", requestOptions)
        .then(response => response.text())
        .then(results => console.log((this.evos = JSON.parse(results))))
        .catch(error => console.log("error", error));
    },
    img(index) {
      return require("../assets/img/" + index);
    },
    playPokemonCry(pokemonId) {
      const audio = new Audio(
        `https://pokemoncries.com/cries-old/${pokemonId}.mp3`
      );
      audio.play();
    },
    test() {
      console.log("test");
    },
    imgtype(index) {
      if (index != "") {
        return require("../assets/img/" + index + ".png");
      }
    },
    show(index) {
      window.location.href = `/${index}`;
    }
  },
  beforeMount() {
    this.get();
    this.getevo();
  }
};
</script>
<style scoped>
* {
  margin: 0;
  padding: 0;
}
.arrow {
  width: 5%;
}
.arro {
  display: flex;
  justify-content: space-between;
}
.crie {
  margin-left: 50%;
  transform: translate(-50%);
}
.description {
  text-align: center;
}
h3 {
  text-decoration: underline;
}
.soustitre {
  text-align: center;
}
.fondbarre {
  background-color: lightgray;
}
.barrered {
  background-color: red;
  padding: 7px;
}
.barregreen {
  background-color: green;
  padding: 7px;
}
.barreyellow {
  background-color: yellow;
  padding: 7px;
}
.evos {
  display: flex;
  text-align: center;
  flex-direction: column;
}
.evo {
  display: flex;
  text-align: center;
  flex-direction: column;
}
.evol {
  display: flex;
  text-align: center;
  flex-direction: column;
}
.evol img {
  width: 25%;
  margin-left: 50%;
  transform: translate(-50%);
}
.trstats {
  transform: translate(600px);
}
.trweak {
  transform: translate(700px);
}
.butevo {
  width: 15%;
  margin-left: 50%;
  transform: translate(-50%);
}
.logo {
  width: 500px;
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
.type {
  width: 100px;
  margin: 5px;
}
.types {
  width: 100px;
}
tr {
  text-align: center;
}
th {
  padding: 5px;
  width: 200px;
}
td {
  width: 200px;
  padding: 5px;
}
h3 {
  text-align: center;
}
.img {
  display: flex;
  justify-content: center;
}
.header {
  display: flex;
  justify-content: space-between;
  padding: 10px;
  background: gray;
}
</style>
