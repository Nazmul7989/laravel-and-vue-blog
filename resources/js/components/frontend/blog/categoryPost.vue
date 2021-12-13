<template>
    <div>
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <div class="inner-heading">
                            <h2>Category Posts</h2>
                        </div>
                    </div>
                    <div class="span8">
                        <ul class="breadcrumb">
                            <li><router-link :to="{name: 'home-public'}"><i class="icon-home"></i></router-link><i class="icon-angle-right"></i></li>
                            <li><router-link :to="{name: 'blog'}">Blog</router-link><i class="icon-angle-right"></i></li>
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
                                <div class="span8" v-for="blog in blogs" :key="blog.id">
                                    <div class="post-image">
                                        <div class="post-heading">
                                            <h3><a href="#">{{ blog.title }}</a></h3>
                                        </div>
                                        <img :src=" '/assets/admin/images/posts/' + blog.image " alt="" />
                                    </div>
                                    <p>{{ blog.description | shortLength(50,'....') }}</p>
                                    <div class="bottom-article">
                                        <ul class="meta-post">
                                            <li><i class="icon-calendar"></i><a href="#"> {{ blog.createt_at | dateFormat }}</a></li>

                                            <li v-if="blog.user"><i class="icon-user"></i><a href="#"> {{ blog.user.name }}</a></li>
                                            <li v-else><i class="icon-user"></i><a href="#"> {{ blog.user_id }}</a></li>

                                            <li v-if="blog.category"><i class="icon-folder-open"></i><a href="#"> {{ blog.category.name }}</a></li>
                                            <li v-else><i class="icon-folder-open"></i><a href="#"> {{ blog.category_id }}</a></li>
                                            <!--                                            <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>-->
                                        </ul>
                                        <router-link :to="{name: 'blog-single', params: {slug: blog.slug},query: {id: blog.id} }" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div id="pagination">
                            <span class="all">Page 1 of 3</span>
                            <span class="current">1</span>
                            <a href="#" class="inactive">2</a>
                            <a href="#" class="inactive">3</a>
                        </div>
                    </div>
                    <!-- Blog sidebar start here -->
                    <sidebar></sidebar>
                    <!-- Blog sidebar end here -->


                </div>
            </div>
        </section>
    </div>
</template>

<script>
import sidebar from "./sidebar";
export default {

    data(){
        return{

        }
    },
    methods: {
        loadBlog(){
            let id = this.$route.query.id
            this.$store.dispatch('loadCategoryPosts', id)
        }
    },
    components: {
        sidebar,
    },
    computed: {
        blogs(){
            return this.$store.getters.getCategoryPosts
        }

    },
    mounted() {
        this.loadBlog()
        // let id = this.$route.query.id
        // this.$store.dispatch('loadCategoryPosts', id)
    },
    watch: {
        $route(to,from){
            this.loadBlog()
            // let id = this.$route.query.id
            // this.$store.dispatch('loadCategoryPosts', id)
        }
    }
}
</script>

<style scoped>

</style>
