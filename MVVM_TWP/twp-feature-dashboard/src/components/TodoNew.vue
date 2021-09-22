<template>
  <div class="row">
    <div class="col form-inline">
      <b-form-input
        id="input-2"
        v-model="task"
        required
        placeholder="Enter Task"
        @keyup.enter="addTodo"
      ></b-form-input>
      <b-button @click="addTodo" variant="primary" class="ml-3">Add</b-button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      task: "",
      id: 0,
    };
  },
  methods: {
    addTodo: function () {
      const { id, task } = this;
      this.$store.commit("addTodo", { id, task });
      this.id++;
      this.task = "";
      console.log("Add task:" + this.id);
    },
  },
};
</script>