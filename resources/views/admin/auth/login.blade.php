{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--    <title>Laravel and Vue eCommerce</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container mt-5" id="app">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header text-center">--}}
{{--                    <h3>Login</h3>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <form>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="email">Email</label>--}}
{{--                                    <input type="email" id="email" v-model="email" name="email" class="form-control @error('email') is-invalid @enderror">--}}

{{--                                    @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="password">Password</label>--}}
{{--                                    <input type="password" id="password" v-model="password" name="password" class="form-control @error('password') is-invalid @enderror">--}}

{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <input type="submit" @click.prevent="login" value="Login" class="btn btn-success">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<!-- Scripts -->--}}
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--<script>--}}

{{--    new Vue({--}}
{{--        data(){--}}
{{--            return{--}}
{{--                email: '',--}}
{{--                password: ''--}}

{{--            }--}}
{{--        },--}}
{{--        methods: {--}}
{{--            login(){--}}
{{--                axios.post('/adminLogin',{--}}
{{--                    'email' : this.email,--}}
{{--                    'password' : this.password--}}
{{--                }).then((response)=>{--}}

{{--                    if(response.status === 200){--}}
{{--                        if (response.data === 1){--}}
{{--                            Toast.fire({--}}
{{--                                icon: 'success',--}}
{{--                                title: 'Signed in successfully'--}}
{{--                            })--}}
{{--                            this.$router.push({name: 'home'})--}}
{{--                        }else {--}}
{{--                            Toast.fire({--}}
{{--                                icon: 'error',--}}
{{--                                title: 'You have entered wrong email or password!'--}}
{{--                            })--}}
{{--                        }--}}
{{--                    }else {--}}
{{--                        Toast.fire({--}}
{{--                            icon: 'error',--}}
{{--                            title: 'Response not Found!'--}}
{{--                        })--}}
{{--                    }--}}

{{--                })--}}
{{--            }--}}
{{--        }--}}
{{--    }).$mount('#app')--}}



{{--</script>--}}

{{--</body>--}}
{{--</html>--}}
