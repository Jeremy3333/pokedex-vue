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
                    <h2>Edit Post-It</h2>
                    <a href="#/"><img src="@/assets/img/long-arrow-left.png" /></a>
                </div>
                <input v-model="this.title" placeholder="Title">
                <br>
                <textarea placeholder="Description" v-model="content"></textarea>
                <br>
                <button @click="edit">save</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data (){
        return {
        posts: JSON.parse(localStorage.getItem("Post_It")),
        yayas: "",
        title: ""
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
            .then(result => console.log(this.yayas = JSON.parse(result.slice(8, -1), console.log(this.title = JSON.parse(result.slice(8, -1)).title), console.log(this.content = JSON.parse(result.slice(8, -1)).content))))
            .catch(error => console.log('error', error));
        },
        edit () {
            console.log("iazuhd")
            var myHeaders = new Headers();
            myHeaders.append("Content-Type", " application/json");

            var raw = "{\"title\": \""+this.title+"\" ,\"content\": [\""+this.content+"\"]}";

            var requestOptions = {
            method: 'PUT',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };

            fetch("http://5.135.119.239:3090/notes/"+this.$route.params.id, requestOptions)
                .then(response => response.text())
                .then(result => console.log(result))
                .catch(error => console.log('error', error));
            window.location.href = '#/';
        }
    },
    beforeMount(){
        this.get()
    }
};
</script>
