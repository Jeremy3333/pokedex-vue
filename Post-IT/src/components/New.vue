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
                <h2>New Post-It</h2>
                <a href="#/"><img src="@/assets/img/long-arrow-left.png" /></a>
            </div>
            <input v-model="title" placeholder="Title">
            <br>
            <textarea placeholder="Description" v-model="description"></textarea>
            <br>
            <button @click="addfetch">save</button>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            title: "",
            description: "",
            posts: JSON.parse(localStorage.getItem("Post_It")),
            array: JSON.parse(localStorage.getItem('Post_It'))
        }
    },
    methods: {
        addPost_It() {
            if (!(this.title == "") && !(this.title == undefined) && !(this.title == null) && !(this.description == "") && !(this.description == undefined) && !(this.description == null)){
                this.array.push([
                    {title: this.title, description: this.description}
                ])
                localStorage.Post_It = JSON.stringify(this.array);
                window.location.href = '#/';
            } else {
                alert("fill up title and description")
            }
        },
        addfetch(){
          if (!(this.title == "") && !(this.title == undefined) && !(this.title == null) && !(this.description == "") && !(this.description == undefined) && !(this.description == null)){
            var myHeaders = new Headers();
            myHeaders.append("Content-Type", " application/json");

            var raw = "{\"title\": \""+this.title+"\" ,\"content\": [\""+this.description+"\"]}";

            var requestOptions = {
              method: 'POST',
              headers: myHeaders,
              body: raw,
              redirect: 'follow'
            };

          fetch("http://5.135.119.239:3090/notes", requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));
            window.location.href = '#/';
          } else {
              alert("fill up title and description")
          }
        },
    }    
};
</script>