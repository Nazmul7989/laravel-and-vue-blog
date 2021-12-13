import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {

        blogs: [],
        categories: [],
        latestPosts: [],
        categoryPosts: [],
    },
    getters: {
        getBlogs(state){
            return state.blogs;
        },
        getCategories(state){
            return state.categories;
        },
        getLatestPosts(state){
            return state.latestPosts;
        },
        getCategoryPosts(state){
            return state.categoryPosts;
        },
    },
    mutations: {

        SET_BLOGS(state,data){
            state.blogs = data;
        },
        SET_CATEGORIES(state,data){
            state.categories = data;
        },
        SET_LATESTPOSTS(state,data){
            state.latestPosts = data;
        },
        SET_CATEGORYPOSTS(state,data){
            state.categoryPosts = data;
        },
        SET_SEARCHPOSTS(state,data){
            state.blogs = data;
        },
    },
    actions: {
        loadBlogs(context){
            axios.get('/getBlog').then((response)=>{
                context.commit('SET_BLOGS', response.data.data)
            }).catch((error)=>{
                console.log(error)
            })
        },
        loadCategories(context){
            axios.get('/geCategories').then((response)=>{
                context.commit('SET_CATEGORIES', response.data)
            }).catch((error)=>{
                console.log(error)
            })
        },
        loadLatestPosts(context){
            axios.get('/geLatestPosts').then((response)=>{
                context.commit('SET_LATESTPOSTS', response.data)
            }).catch((error)=>{
                console.log(error)
            })
        },
        loadCategoryPosts(context,payload){
            axios.get('/geCategoryPosts/' + payload).then((response)=>{
                context.commit('SET_CATEGORYPOSTS', response.data)
            }).catch((error)=>{
                console.log(error)
            })
        },
        loadSearchPosts(context,payload){
            axios.get('/search?s=' + payload).then((response)=>{
                context.commit('SET_SEARCHPOSTS', response.data)
            }).catch((error)=>{
                console.log(error)
            })
        },
    }
});
