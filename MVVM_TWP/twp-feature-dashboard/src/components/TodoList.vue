<template>
    <div class="col-3">
      <div class="p-2 alert alert-secondary">
        <h3>{{ title }}</h3>
        <div class="list-group twp-column" group="tasks">
          <div class="list-group-item" v-for="todo in todos" :key="todo.id">
            {{ todo.task }}
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  props: {
    title: String,
  },
  computed: {
    todos() {
      return this.$store.getters.getTodos;
    },
  },
};
</script>

<style>
/* light stylings for the twp columns */
.twp-column {
  min-height: 300px;
}
</style>