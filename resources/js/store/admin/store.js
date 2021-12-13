import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        categories: [],
        posts: {},
        contacts: [],
    },
    getters: {
        getCategories(state){
            return state.categories;
        },
        getPosts(state){
            return state.posts;
        },
        getContacts(state){
            return state.contacts;
        },
    },
    mutations: {
        SET_CATEGORIES(state,data){
            state.categories = data;
        },
        SET_POSTS(state,data){
            state.posts = data;
        },
        SET_CONTACTS(state,data){
            state.contacts = data;
        },
    },
    actions: {
        loadCategories(context){
           axios.get('/category').then((response)=>{
               context.commit('SET_CATEGORIES', response.data)
           }).catch((error)=>{
               console.log(error)
           })

        },
        loadPosts(context){
            axios.get('/post').then((response)=>{
                context.commit('SET_POSTS', response.data)
            }).catch((error)=>{
                console.log(error)
            })

        },
        loadContacts(context){
            axios.get('/contacts').then((response)=>{
                context.commit('SET_CONTACTS', response.data)
            }).catch((error)=>{
                console.log(error)
            })

        },

    }
});
