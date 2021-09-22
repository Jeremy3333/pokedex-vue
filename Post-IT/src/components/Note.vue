<template>
  <div class="test">
    <div class="blur">
      <h1>Post-it App Project</h1>
      <div class="steps">
      </div>
    </div>
    <div class="note">
      <div class="first-note">
        <div class="title">
          <h3>{{ yayas.title }}</h3>
          <a href="#/"><img src="@/assets/img/long-arrow-left.png" /></a>
        </div>
        <div class="post-it">
          {{ yayas.content[0] }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data (){
    return {
      posts: JSON.parse(localStorage.getItem("Post_It")),
      yayas: ""
    }
  },
  methods: {
    get () {
      var myHeaders = new Headers();
      myHeaders.append("Content-Type", " application/json");

      var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow'
      };

      fetch("http://5.135.119.239:3090/notes/"+this.$route.params.id, requestOptions)
        .then(response => response.text())
        .then(result => console.log(this.yayas = JSON.parse(result.slice(8, -1))))
        .catch(error => console.log('error', error));
    }
  },
 beforeMount(){
    this.get()
 }
};
</script>
