import Vue from 'vue'
import App from './App.vue'
import Vuex from 'vuex'
import { mapGetters } from 'vuex';

// Import Bootstrap Vue
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.config.productionTip = false

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
// Import vuex to create store
Vue.use(Vuex)

const store = new Vuex.Store({
  state() {
    return {
      todos: [
        { id: 1, task: 'test1', done: true },
        { id: 2, task: 'test2', done: false },
      ]
    }
  },
  mutations: {
    increment(state) {
      state.count++
    },
    addTodo(state, item) {
      state.todos.unshift(item);
    }
  },
  getters: {
    getTodos(state) {
      return state.todos;
    },
    getTodoById: (state) => (id) => {
      return state.todos.find(todo => todo.id === id)
    },
    todoCount(state) {
      return state.todos.length;
    },
    doneTodos: state => {
      return state.todos.filter(todo => todo.done);
    },
    doneTodosCount: (state, getters) => {
      return getters.doneTodos.length
    },
  }
})

new Vue({
  render: h => h(App),
  store,
  data: {
  },
  computed: mapGetters()
}).$mount('#app')
