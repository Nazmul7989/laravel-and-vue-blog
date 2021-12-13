<template>
<div>
    <div class="span4">
        <aside class="right-sidebar">
            <div class="widget">
                <form class="form-search">
                    <input type="text" @keyup="searchPost" v-model="searchTxt" placeholder="Type something"  class="input-medium search-query">
                    <button type="submit" @click.prevent="searchPost" class="btn btn-square btn-theme">Search</button>
                </form>
            </div>
            <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                    <li v-for="category in categories" :key="category.id">
                        <i class="icon-angle-right"></i>
                        <router-link :to="{ name: 'category-post', params: {slug: category.slug}, query: {id: category.id} }">{{ category.name }}</router-link>
                    </li>

                </ul>
            </div>
            <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                    <li v-for="post in posts" :key="post.id">
                        <img :src=" '/assets/admin/images/posts/' + post.image" style="width: 100px; height: 70px;" class="pull-left" alt="" />
                        <h6><router-link :to="{name: 'blog-single', params: {slug: post.slug}, query: {id: post.id}}">{{ post.title }}</router-link></h6>
                        <p>{{ post.description | shortLength(30,'.')}}</p>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
</div>
</template>

<script>
import _ from 'lodash'

export default {
    name: "sidebar",
    data(){
        return{
            searchTxt: ''
        }
    },
    methods: {
        // searchPost(){
        //     this.$store.dispatch('loadSearchPosts', this.searchTxt)
        // }
       searchPost:_.debounce(function (){
           this.$store.dispatch('loadSearchPosts', this.searchTxt)
       },1000)
    },
    computed: {
        categories(){
            return this.$store.getters.getCategories;
        },
        posts(){
            return this.$store.getters.getLatestPosts;
        }
    },
    mounted() {
        this.$store.dispatch('loadCategories');
        this.$store.dispatch('loadLatestPosts');
    },

}
</script>

<style scoped>

</style>
