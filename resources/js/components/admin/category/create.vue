<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mt-5">
                    <div class="card-header clearfix">
                        <h3 class="float-left">Create Category</h3>
                        <router-link  :to="{name: 'category'}" class="btn btn-success float-right">Back to Category</router-link>
                    </div>

                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" id="name" v-model="form.name" class="form-control" placeholder="Category name">
                                <div class="text-danger" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                            </div>
                            <div class="form-group">
                                <input type="submit" @click.prevent="createCategory" class="btn btn-success" value="Create">
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
                name: ''
            })
        }
    },
    methods: {
        createCategory(){
            this.form.post('/category/create').then((response)=>{
                //show success notification
                Toast.fire({
                    icon: 'success',
                    title: 'Category created successfully'
                })
                //Clear the form after creating category
                this.form.name = ''

            }).catch((error)=>{
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
