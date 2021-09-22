<template>
  <div id="app">
    <div class="header">
      <img src="@/assets/img/497492.png"/><span>Post-it App</span>
    </div>
    <router-view/>
  </div>
</template>

<script>
import Index from "./components/Index.vue";

  export default {
    components: { Index }
  }
</script>

<style src="@/assets/css/bootstrap.min.css"></style>
<style src="@/assets/css/style.css"></style>
