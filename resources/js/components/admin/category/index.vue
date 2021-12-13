<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header clearfix">
                        <h3 class="float-left">All Category</h3>
                        <router-link :to="{name: 'create-category'}" class="btn btn-success float-right">Add Category</router-link>
                    </div>

                    <div  class="card-body" v-if="categories.length">
                        <table class="table table-bordered">
                            <thead>
                            <tr>

                                <th>
                                    <select name="" id="deleteAll" @change="deleteAllCategory" v-model="select" class="form-control">
                                        <label for="deleteAll">Action</label>
                                        <option value="" class="d-none">Action</option>
                                        <option value="">Delete All</option>
                                    </select>
                                    <input type="checkbox" v-model="allSelect" @click="selectAl" class="form-check-inline">
                                    <span v-if="allSelect">Uncheck All</span>
                                    <span v-else>Check All</span>
                                </th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th style="width: 150px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="category in categories" :key="category.id">
                                <td><input type="checkbox" v-model="categoryItems" :value="category.id" class="form-check"></td>
                                <td>{{ category.id }}</td>
                                <td>{{ category.name }}</td>
                                <td>{{ category.slug }}</td>
                                <td>{{ category.created_at | dateFormat }}</td>
                                <td style="width: 150px">
                                    <router-link :to="{name: 'edit-category', params: {id: category.id}, query: {id: category.id} }" class="btn btn-success">Edit</router-link>
                                    <button @click.prevent="deleteCategory(category.id)" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row text-center my-5" v-else>
                        <div class="col-12">
                            <h5>No Category Found</h5>
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
            categoryItems: [],
            select: '',
            allSelect: false,
        }
    },
    methods: {

        deleteCategory(id){
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
                    axios.delete('/category/delete/' + id).then((response)=>{
                        this.$store.dispatch('loadCategories')
                    }).catch((error)=>{
                        console.log(error)
                    })
                    Swal.fire(
                        'Deleted!',
                        'Category deleted successfully.',
                        'success'
                    )
                }
            })
        },
        deleteAllCategory(){
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
                    axios.post('/deleteSelectedCategory/' + this.categoryItems).then((response)=>{
                        this.$store.dispatch('loadCategories')
                        this.categoryItems = []
                    }).catch((error)=>{
                        console.log(error)
                    })
                    Swal.fire(
                        'Deleted!',
                        'Category deleted successfully.',
                        'success'
                    )
                }
            })
        },
        selectAl(){
            if (this.allSelect === false){
                this.allSelect = true
                for (let category in this.categories){
                    this.categoryItems.push(this.categories[category].id)
                }
            }else {
                this.allSelect = false
                this.categoryItems = []
            }
        },
    },
    computed: {
        categories(){
            return this.$store.getters.getCategories;
        }
    },
    mounted() {

       this.$store.dispatch('loadCategories')
    }
}
</script>

<style scoped>

</style>
