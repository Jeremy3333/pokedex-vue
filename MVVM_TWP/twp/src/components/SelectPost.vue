<template>
    <div>
        <div class="blur">
            <post/>
        </div>
        <div class="create">
            <div class="title1">
                <h4>{{ yaya.slug }}</h4>
                <a href="#/"><img src="@/assets/img/long-arrow-left.png" alt="left arrow"></a>
            </div>
            categories: <p v-for="(categorie, index) in yaya.categories" :key="index">{{ find(yaya.categories, index) }}</p>
            <div class="article" v-html="yaya.content.rendered"></div>
        </div>
    </div>
</template>

<script>
import post from "./Post.vue"
export default {
    components: { 
        post
    },
    data () {
        return {
            yaya: "",
            yoyos: ""
        }
    },
    methods: {
        put(){
            var myHeaders = new Headers();
            myHeaders.append("Authorization", "Basic d29yZHByZXNzOlJvYVlOdjd2Wm9C");

            var formdata = new FormData();
            formdata.append("title", "prout");
            formdata.append("content", " qsx");
            formdata.append("categories", "1");

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: formdata,
                redirect: 'follow'
            };

            fetch("http://0.0.0.0:8000/wp-json/wp/v2/posts/30", requestOptions)
                .then(response => response.text())
                .then(result => console.log(result))
                .catch(error => console.log('error', error));
        },
        find (index, turn) {
            return (
                this.yoyos.find(x => x.id == index[turn]).name
            )
        },
        get() {
            var myHeaders = new Headers();
        myHeaders.append("Authorization", "Basic d29yZHByZXNzOlJvYVlOdjd2Wm9C");

        var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
        };

        fetch("http://0.0.0.0:8000/wp-json/wp/v2/posts/"+this.$route.params.id, requestOptions)
            .then(response => response.text())
            .then(result => console.log(this.yaya = JSON.parse(result)))
            .catch(error => console.log('error', error));
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
        },
    },
    beforeMount() {
        this.get()
        this.getcat()
        this.$route.params.id
    }
}
</script>

<style>
.blur {
    filter: blur(2px);
}
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
</style>