<template>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="login">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" v-model="form.email" class="form-control">
                                <div class="text-danger" v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" v-model="form.password" class="form-control">
                                <div class="text-danger" v-if="form.errors.has('password')" v-html="form.errors.get('password')" />
                            </div>
                            <div class="form-group">
                                <p>Don't have an account?
                                    <router-link :to="{name: 'register'}">Click here to Register</router-link>
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success px-3" value="Login">
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
                email: '',
                password: '',
            })
        }
    },

    methods: {
        login(){
            axios.post('/adminLogin',{
                'email' : this.email,
                'password' : this.password
            }).then((response)=>{

                if(response.status === 200){
                    if (response.data === 1){
                        Toast.fire({
                            icon: 'success',
                            title: 'Signed in successfully'
                        })
                        this.$router.push({name: 'dashboard'})
                    }else {
                        Toast.fire({
                            icon: 'error',
                            title: 'You have entered wrong email or password!'
                        })
                    }
                }else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Response not Found!'
                    })
                }

            })
        }

    }

}
</script>

<style scoped>

</style>
