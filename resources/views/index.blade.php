<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Laravel and Vue Blog</title>

    </head>
    <body>
    <div id="app">

        <site-navbar></site-navbar>

        <div class="container">
            <div class="row">
                <div class="col-12">

                    <router-view></router-view>

                </div>
            </div>
        </div>


    </div>




    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    </body>
</html>
