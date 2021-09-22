<template>
    <div class="categories row">
        <div class="task col-sm-3" v-for="(yaya, index) in yayas" :key="index">
            <div class="title">
                <h4>{{ yaya.slug }}</h4>
                <a @click="select(yaya.id)"><img src="@/assets/img/1380510-200.png" alt="select"></a>
            </div>
            categories: <p v-for="(categorie, index) in yaya.categories" :key="index">{{ find(yaya.categories, index) }}</p>
            <div class="article text-break" v-html="yaya.content.rendered"></div>
            <div class="trash">
                <div class="edit" @click="edit(yaya.id)"><img src="@/assets/img/Edit_icon_(the_Noun_Project_30184).svg.png" alt="edit"></div>
                <div class="delete" @click="delet(yaya.id)"><img src="@/assets/img/trash-bin-symbol_318-10194.png" alt="trash"></div>
            </div>
        </div>
        <a class="new col-sm-3" href="#/new">+ Add post</a>
        </div>
</template>

<script>
export default {
    data () {
        return {
            yayas: "",
            yoyos: ""
        }
    },
    methods: {
        find (index, turn) {
            return (
                this.yoyos.find(x => x.id == index[turn]).name
            )
        },
        edit (index) {
            window.location.href = "#/editpost/"+index
        },
        get () {
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            fetch("http://0.0.0.0:8000/wp-json/wp/v2/posts", requestOptions)
                .then(response => response.text())
                .then(result => console.log(this.yayas = JSON.parse(result)))
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
        delet (index) {
            var myHeaders = new Headers();
            myHeaders.append("Authorization", "Basic d29yZHByZXNzOlJvYVlOdjd2Wm9C");

            var requestOptions = {
                method: 'DELETE',
                headers: myHeaders,
                redirect: 'follow'
            };

            fetch("http://0.0.0.0:8000/wp-json/wp/v2/posts/"+index, requestOptions)
                .then(response => response.text())
                .then(result => console.log(result))
                .catch(error => console.log('error', error));
        },
        select (index) {
            window.location.href = "#/post/"+index
        }
    },
    beforeMount() {
        this.getcat()
        this.get()
    }
}
</script>

<style>
a {
    color: black;
}
a:hover{
    color: black !important;
    text-decoration: none !important;
}
.title {
    display: flex;
    justify-content: space-between;
}
.title a{
    width: 10% !important;
}
.title img{
    width: 100% !important;
}
.task {
    background-color: #f4f4ff;
    margin: 50px !important;
    border: solid 1px #a9a9ab;
    border-radius: 10px;
    padding: 15px !important;
    height: max-content !important;
    text-align: center;
}
.article p{
    background-color: white;
    border-radius: 10px;
    box-shadow: 2px 2px 5px #a9a9ab, -2px 2px 5px #a9a9ab;
    margin-bottom: 10px !important;
    margin-top: 10px !important;
    padding: 20px !important;
}
.new {
    margin: 50px !important;
    border: dashed 1px #a9a9ab;
    border-radius: 10px;
    padding: 15px !important;
    height: max-content !important;
    text-align: center;
}
.trash {
    display: flex;
    justify-content: space-between;
}
.trash img{
    width: 100%;
}
.edit {
    display: flex;
    width: 20%;
    justify-content: left;
}
.delete {
    display: flex;
    width: 20%;
    justify-content: right;
}
</style>