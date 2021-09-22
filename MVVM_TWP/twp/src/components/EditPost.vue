<template>
    <div>
        <div class="blur">
            <post/>
        </div>
        <div class="create">
            <div class="title1">
                <h4>New post</h4>
                <a href="#/"><img src="@/assets/img/long-arrow-left.png" alt="left arrow"></a>
            </div>
            <input v-model="title" placeholder="Title">
            <br>
            <textarea v-model="content" placeholder="Content"></textarea>
            <br>
            <select  class="input" v-model="categories">
                <option @click="test" v-for="(yoyo, index) in yoyos" :key="index" v-bind:value="yoyo.id">{{ yoyo.name }}</option>
            </select>
            <br>
            <button @click="add">save</button>
        </div>
    </div>
</template>

<script>
import Header from "./Header.vue"
import post from "./Post.vue"
export default {
    components: { 
        post,
    },
    data () {
        return {
            title: "",
            content: "",
            categories: "",
            yoyos: "",
            yaya: ""
        }
    },
    methods: {
        add () {
            if (this.title == "" || this.title == null || this.title == undefined || this.content == "" || this.content == null || this.content == undefined) {
                alert('add a title and a description')
            } else {
                var myHeaders = new Headers();
                myHeaders.append("Authorization", "Basic d29yZHByZXNzOlJvYVlOdjd2Wm9C");

                var formdata = new FormData();
                    formdata.append("title", this.title);
                    formdata.append("content", this.content);
                    formdata.append("status", "publish");
                    formdata.append("categories", this.categories);

                var requestOptions = {
                    method: 'POST',
                    headers: myHeaders,
                    body: formdata,
                    redirect: 'follow'
                };

                fetch("http://0.0.0.0:8000/wp-json/wp/v2/posts", requestOptions)
                    .then(response => response.text())
                    .then(result => console.log(result))
                    .catch(error => console.log('error', error));
                window.location.href = "#/"
            }
        },
        getcat () {
            var myHeaders = new Headers();
            myHeaders.append("Authorization", "Basic d29yZHByZXNzOlJvYVlOdjd2Wm9C");

            var requestOptions = {
                method: 'GET',
                headers: myHeaders,
                redirect: 'follow'
            };

            fetch("http://0.0.0.0:8000/wp-json/wp/v2/categories", requestOptions)
                .then(response => response.text())
                .then(result => console.log(this.yoyos = JSON.parse(result)))
                .catch(error => console.log('error', error));
        }
    },
    beforeMount() {
        console.log('test')
        this.getcat()
    }
}
</script>

<style scoped>
.title1 {
    display: flex;
    justify-content: space-between;
}
.title1 a{
    width: 15%;
}
img{
    width: 100%;
}
.blur {
    filter: blur(2px);
}
.create{
    background-color: #f4f4ff;
    width: 15%;
    border: solid 1px #a9a9ab;
    border-radius: 10px;
    padding: 15px !important;
    height: max-content !important;
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.input{
    display: flex;
    justify-content: left;
}
</style>
