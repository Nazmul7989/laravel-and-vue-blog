<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card mt-5">
                    <div class="card-header clearfix">
                        <h3 class="float-left">Create Posts</h3>
                        <router-link  :to="{name: 'post'}" class="btn btn-success float-right">Back to Post</router-link>
                    </div>

                    <div class="card-body">
                        <form enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="image">Post Image</label>
                                        <input type="file" id="image" @change="onImageChange" class="form-control">
                                        <div class="text-danger" v-if="form.errors.has('image')" v-html="form.errors.get('image')" />
                                    </div>
                                </div>
                                <div class="col-4">
                                    <img :src="imageShow" style="height: 70px; width: 120px;" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" id="title" v-model="form.title" class="form-control" placeholder="Post title">
                                <div class="text-danger" v-if="form.errors.has('title')" v-html="form.errors.get('title')" />
                            </div>
                            <div class="form-group">
                                <label for="category">Post Category</label>
                                <select id="category"  v-model="form.category_id" class="form-control">
                                    <option value="" selected class="d-none">Select a Category</option>
                                    <option v-for="category in categories" :key="category.id" :value="category.id" >{{ category.name }}</option>
                                </select>
                                <div class="text-danger" v-if="form.errors.has('category_id')" v-html="form.errors.get('category_id')" />
                            </div>
                            <div class="form-group">
                                <label for="description">Post Description</label>
                                <textarea cols="30" rows="4"  id="description" v-model="form.description" class="form-control" placeholder="Post description"></textarea>
                                <div class="text-danger" v-if="form.errors.has('description')" v-html="form.errors.get('description')" />
                            </div>
                            <div class="form-group">
                                <input type="submit" @click.prevent="createPost" class="btn btn-success" value="Add Post">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Form from 'vform'


export default {
    data(){
        return{
            form: new Form({
                image: '',
                title: '',
                category_id: '',
                description: ''
            }),
            imageShow: ''
        }
    },
    methods: {
        createPost(){
            this.form.post('/post/create',this.$objectToFD(this.form)).then((res)=>{

                this.form.image = ''
                this.form.title = ''
                this.form.category_id = ''
                this.form.description = ''
                this.imageShow = ''

                //show success notification
                this.$toast.success({
                    title:'success',
                    message:'Post created successfully'
                })

            })
        },
        onImageChange(e){
            let file = e.target.files[0];
            this.form.image = file;

            let reader = new FileReader();
            reader.onload = (e)=>{
                this.imageShow = e.target.result
            };

            reader.readAsDataURL(file);

        },
    },
    computed: {
        categories(){
            return this.$store.getters.getCategories
        }
    },
    mounted() {
        this.$store.dispatch('loadCategories')
    }
}
</script>


<style scoped>

</style>
