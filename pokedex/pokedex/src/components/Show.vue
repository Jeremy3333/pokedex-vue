<template>
    <div>
        <div class="select">
            <div class="header">
                <p>n°{{ pokemon.note.id }}</p>
                <h3>{{ pokemon.note.name }}</h3>
                <p>{{ pokemon.note.types.type1 }} {{ pokemon.note.types.type2 }}</p>
            </div>
            <div class="img">
                <img :src="img(pokemon.note.image)" v-bind:alt="pokemon.nom_pok">
            </div>
            <div class="stats">
                <h3>Stats</h3>
                <tr>
                    <th>HP</th>
                    <th>attack</th>
                    <th>defense</th>
                    <th>special attack</th>
                    <th>special defense</th>
                    <th>speed</th>
                </tr>
                <tr>
                    <td>{{ pokemon.note.stats.hp }}</td>
                    <td>{{ pokemon.note.stats.attack }}</td>
                    <td>{{ pokemon.note.stats.defense }}</td>
                    <td>{{ pokemon.note.stats.special_attack }}</td>
                    <td>{{ pokemon.note.stats.special_defense }}</td>
                    <td>{{ pokemon.note.stats.speed }}</td>
                </tr>
            </div>
            <div class="weak">
                <h3>weaknesses</h3>
                <tr>
                    <th>bug</th>
                    <td>{{ pokemon.note.weaknesses.bug }}</td>
                </tr>
                <tr>
                    <th>dark</th>
                    <td>?</td>
                </tr>
                <tr>
                    <th>dragon</th>
                    <td>{{ pokemon.note.weaknesses.dragon }}</td>
                </tr>
                <tr>
                    <th>electric</th>
                    <td>{{ pokemon.note.weaknesses.electric }}</td>
                </tr>
                <tr>
                    <th>fairy</th>
                    <td>{{ pokemon.note.weaknesses.fairy }}</td>
                </tr>
                <tr>
                    <th>fight</th>
                    <td>{{ pokemon.note.weaknesses.fight }}</td>
                </tr>
                <tr>
                    <th>fire</th>
                    <td>{{ pokemon.note.weaknesses.fire }}</td>
                </tr>
                <tr>
                    <th>flying</th>
                    <td>{{ pokemon.note.weaknesses.flying }}</td>
                </tr>
                <tr>
                    <th>ghost</th>
                    <td>{{ pokemon.note.weaknesses.ghost }}</td>
                </tr>
                <tr>
                    <th>grass</th>
                    <td>{{ pokemon.note.weaknesses.grass }}</td>
                </tr>
                <tr>
                    <th>ground</th>
                    <td>{{ pokemon.note.weaknesses.ground }}</td>
                </tr>
                <tr>
                    <th>ice</th>
                    <td>{{ pokemon.note.weaknesses.ice }}</td>
                </tr>
                <tr>
                    <th>normal</th>
                    <td>{{ pokemon.note.weaknesses.normal }}</td>
                </tr>
                <tr>
                    <th>poison</th>
                    <td>{{ pokemon.note.weaknesses.poison }}</td>
                </tr>
                <tr>
                    <th>psychic</th>
                    <td>{{ pokemon.note.weaknesses.psychic }}</td>
                </tr>
                <tr>
                    <th>rock</th>
                    <td>{{ pokemon.note.weaknesses.rock }}</td>
                </tr>
                <tr>
                    <th>steel</th>
                    <td>{{ pokemon.note.weaknesses.steel }}</td>
                </tr>
                <tr>
                    <th>water</th>
                    <td>{{ pokemon.note.weaknesses.water }}</td>
                </tr>
            </div>
            <div class="evos">
                <h3>evolutions</h3>
                <div class="evo" v-for="(evolution, index) in pokemon.note.evolutions" :key="index">
                    {{ getevo(evolution.evolution.evolution_id) }}
                    <br>    
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
* {
    margin: 0;
    padding: 0;
}
.select {
    border: 1px solid lightgray;
}
.col {
    padding: 0;
    background-color: lightblue;
}
.colu {
    background-color: white;
    margin: 0;
}
tr {
    text-align: center;
}
th  {
    border: 2px solid black;
    padding: 5px;
    width: 200px;
}
td {
    border: 1px solid black;
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
    background: lightgray;
}
</style>
<script>
import Button from '../../../../../D-DEV-120-PAR-1-1-freeads-jeremy.simond/laravel/resources/js/Jetstream/Button.vue';
export default {
    data () {
       
        Button return {
            pokemon: "",
            evos: "",
            result: "",
        }
    },
    methods: {
        get(){
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            fetch("http://localhost:8000/api/pokemons/"+this.$route.params.id, requestOptions)
                .then(response => response.text())
                .then(resulte => console.log(this.pokemon = JSON.parse(resulte)))
                .catch(error => console.log('error', error));
        },
        getevo(index){
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            fetch("http://localhost:8000/api/pokemons/"+index, requestOptions)
                .then(response => response.text())
                .then(results => console.log(this.evos = JSON.parse(results)))
                .catch(error => console.log('error', error));
        },
        img(index){
            return require('../assets/img/'+index)
        },
        test(){
            console.log("test")
        },
    },
    beforeMount() {
        this.get()
    },
}
</script>