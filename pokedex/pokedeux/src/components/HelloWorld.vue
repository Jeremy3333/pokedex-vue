<template>
  <div class="hello">
    <div class="enters">
      <img src="../assets/img/enter.png" alt="welcome" class="enter" />
      <br />
      <button @click="welcome()" class="button">enter</button>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    welcome() {
      this.$store.commit("GetPokedex");
      setTimeout(function() {
        window.location.href = "/pokedex";
      }, 2000);
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.button {
  margin-left: 50%;
  transform: translate(-50%);
}
.enter {
  width: 60%;
  margin-left: 50%;
  transform: translate(-50%);
}
</style>
