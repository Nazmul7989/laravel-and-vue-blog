<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header clearfix">
                        <h3 class="float-left">All Posts</h3>
                        <router-link :to="{name: 'create-post'}" class="btn btn-success float-right">Add Post</router-link>
                    </div>

                    <div class="card-body" v-if="posts.data">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th>Admin</th>
                                <th>Description</th>
                                <th style="width: 150px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in posts.data" :key="post.id">
                                    <td>{{ post.id }}</td>
                                    <td>
                                        <img :src=" 'assets/admin/images/posts/' + post.image" style="width: 150px; height: 80px;" alt="">
                                    </td>
                                    <td>{{ post.title }}</td>
                                    <td>{{ post.slug }}</td>
                                    <td>
                                        <span v-if="post.category">{{ post.category.name }}</span>
                                        <span v-else>{{ post.category_id }}</span>
                                    </td>
                                    <td>
                                        <span v-if="post.user">{{ post.user.name }}</span>
                                        <span v-else>{{ post.user_id }}</span>
                                    </td>
                                    <td>{{ post.description |shortLength(20, '....') }}</td>
                                    <td style="width: 150px">
                                        <router-link :to="{name: 'edit-post', query: {id: post.id} }" class="btn btn-success">Edit</router-link>
                                        <button @click.prevent="deletePost(post.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row text-center my-5" v-else>
                        <div class="col-12">
                            <h5 >No Posts Found</h5>
                        </div>
                    </div>
                    <div>
                        <div class="col-12">
                        <!--  Pagination goes here  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Swal from "sweetalert2";


export default {
    data(){
        return{

        }
    },
    methods: {
        // getPosts() {
        //     this.$store.dispatch('loadPosts');
        // },
        deletePost(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                width: 400,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/post/delete/'+ id).then((res)=>{
                        this.$store.dispatch('loadPosts')
                    })
                    Swal.fire(
                        'Deleted!',
                        'Your Post  deleted successfully.',
                        'success'
                    )
                }
            })
        }

    },
    computed: {
      posts(){
          return this.$store.getters.getPosts
      }
    },
    mounted() {
        // this.getPosts()
        this.$store.dispatch('loadPosts')
    }
}
</script>

<style scoped>

</style>
