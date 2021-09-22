<template>
  <div id="app">
    <Header/>
    <router-view/>
  </div>
</template>

<script>
import Header from './components/Header'
import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
export const store = new Vuex.Store()

export default {
  components: { Header }
}
</script>

<style src="@/assets/css/bootstrap.min.css"></style>
<style>
* {
  margin: 0 !important;
  padding: 0 !important;
}
</style>
