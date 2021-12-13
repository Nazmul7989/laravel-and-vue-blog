<template>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-7">
                <div class="card mt-5">
                    <div class="card-header clearfix">
                        <h3 class="float-left">Edit Category</h3>
                        <router-link :to="{name: 'category'}" class="btn btn-success float-right">Back to Category</router-link>
                    </div>

                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" id="name" v-model="form.name" class="form-control">
                                <div class="text-danger" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                            </div>
                            <div class="form-group">
                                <input type="submit" @click.prevent="updateCategory" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Form from "vform";

export default {
    data(){
        return{
            form: new Form({
                name: ''
            })
        }
    },
    methods: {
        loadCategoy(){
            let id = this.$route.query.id
            axios.get('/category/edit/'+ id).then((response)=>{
                this.form.name = response.data.name
            }).catch((error)=>{
                console.log(error)
            })
        },
        updateCategory(){
            let id = this.$route.query.id

            this.form.put('/category/update/' + id).then((response)=>{
                //show success notification
                Toast.fire({
                    icon: 'success',
                    title: 'Category updated successfully'
                })
                this.$router.push({name: 'category'})

            }).catch((error)=>{
                console.log(error)
            })
        }
    },
    mounted() {
        this.loadCategoy()
    }
}
</script>

<style scoped>

</style>
