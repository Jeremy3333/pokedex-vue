<template>
  <div class="test">
    <h1 @click="fetchAPIData">Post-it App Project</h1>
    <div class="steps row">
      <div class="first col-sm-3" v-for="yaya in yayas" :key="yaya.title">
        <div class="title">
          <h3>{{ yaya.title }}</h3>
          <a @click="note(yaya._id)"
            ><img src="@/assets/img/1380510-200.png"
          /></a>
        </div>
        <div class="post-it">
          {{ yaya.content[0] }}
        </div>
        <div class="trash">
          <a @click="edit(yaya._id)"
            ><img src="@/assets/img/Edit_icon_(the_Noun_Project_30184).svg.png"
          /></a>
          <div @click="delet(yaya._id)">
            <img src="@/assets/img/trash-bin-symbol_318-10194.png" />
          </div>
        </div>
      </div>
      <div class="new-post-it col-sm-3">
        <a href="#/New"><div class="new">+ Add new post-it</div></a>
      </div>
    </div>
  </div>
</template>

<script src="@/assets/script/vuex.js"></script>
<script>
export default {
  data() {
    return {
      yayas: ""
    };
  },
  methods: {
    fetchAPIData: function() {
      var myHeaders = new Headers();
      myHeaders.append("Content-Type", " application/json");

      var requestOptions = {
        method: "GET",
        headers: myHeaders,
        redirect: "follow"
      };

      fetch("http://5.135.119.239:3090/notes", requestOptions)
        .then(response => response.text())
        .then(result =>
          console.log((this.yayas = JSON.parse(result.slice(9, -1))))
        )
        .catch(error => console.log("error", error));
    },
    delet: function(index) {
      var myHeaders = new Headers();
      myHeaders.append("Content-Type", " application/json");

      var requestOptions = {
        method: "DELETE",
        headers: myHeaders,
        redirect: "follow"
      };

      fetch("http://5.135.119.239:3090/notes/" + index, requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log("error", error));
    },
    note: function(index) {
      window.location.href = "#/note/" + index;
    },
    edit: function(index) {
      window.location.href = "#/edit/" + index;
    },
  },
  beforeMount() {
    this.fetchAPIData();
  }
};
</script>
