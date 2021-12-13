<template>
    <div>
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <div class="inner-heading">
                            <h2>Blog Single</h2>
                        </div>
                    </div>
                    <div class="span8">
                        <ul class="breadcrumb">
                            <li><router-link :to="{name: 'home-public'}"><i class="icon-home"></i></router-link><i class="icon-angle-right"></i></li>
                            <li><router-link :to="{name: 'blog'}">Blog</router-link><i class="icon-angle-right"></i></li>
                            <li class="active">{{ this.$route.params.slug }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <article>
                            <div class="row">
                                <div class="span8">
                                    <div class="post-image">
                                        <div class="post-heading">
                                            <h3><a href="#">{{ blog.title }}</a></h3>
                                        </div>
                                        <img :src=" '/assets/admin/images/posts/' + blog.image" alt="" />
                                    </div>
                                    <p>{{ blog.description }}</p>
                                    <div class="bottom-article">
                                        <ul class="meta-post">
                                            <li v-if="blog.user"><i class="icon-user"></i><a href="#"> {{ blog.user.name }}</a></li>
                                            <li v-else><i class="icon-user"></i><a href="#"> {{ blog.user_id }}</a></li>
                                            <li v-if="blog.category"><i class="icon-folder-open"></i><a href="#"> {{ blog.category.name }}</a></li>
                                            <li v-else><i class="icon-folder-open"></i><a href="#"> {{ blog.category_id }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- Blog sidebar -->
                    <sidebar></sidebar>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import sidebar from "./sidebar";
export default {
    name: "blogSingle",
    data(){
        return{
            blog: ''
        }
    },
    components: {
      sidebar,
    },
    methods: {
       loadSingleBlog(){
           let id = this.$route.query.id;

           axios.get('/getSingleBlog/' + id).then((response)=>{
               this.blog = response.data
           })
       }
    },
    mounted() {
        this.loadSingleBlog()
    },
    watch: {
        $route(to,from){
            this.loadSingleBlog()
        }
    }
}
</script>

<style scoped>

</style>
