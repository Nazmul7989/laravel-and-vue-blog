<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header clearfix">
                        <h3 class="float-left">All Contacts</h3>
                    </div>

                    <div class="card-body" v-if="contacts.length">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th style="width: 150px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="contact in contacts" :key="contact.id">
                                <td>{{ contact.id }}</td>
                                <td>{{ contact.name }}</td>
                                <td>{{ contact.email }}</td>
                                <td>{{ contact.subject }}</td>
                                <td>{{ contact.message }}</td>
                                <td style="width: 150px">
                                    <button @click.prevent="deletePost(contact.id)" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row text-center my-5" v-else>
                        <div class="col-12">
                            <h5 >No Message Found</h5>
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
                    axios.delete('/contact/delete/'+ id).then((res)=>{
                        this.$store.dispatch('loadContacts')
                    })
                    Swal.fire(
                        'Deleted!',
                        'Message deleted successfully.',
                        'success'
                    )
                }
            })
        }

    },
    computed: {
        contacts(){
            return this.$store.getters.getContacts
        }
    },
    mounted() {
        this.$store.dispatch('loadContacts')
    }
}
</script>

<style scoped>

</style>
