<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=9">
        <!--meta http-equiv="x-ua-compatible" content="IE=9" -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Cumbre Nasa</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link href="{{ url(mix('/css/cumbre.css')) }}" rel="stylesheet" type="text/css">
        <style>
            .disc-sitio {
                text-align: center;
                color: #ccc;
                font-size: 10px;
                font-weight: 500; 
                position: absolute;
                bottom: 0;
                z-index: 3;
                width: 90%;                               
            }
        </style>
        <!-- Minified version of `es6-promise-auto` below. -->
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
        <script>
            window.App = {!! json_encode([
            ]) !!};
        </script>   
        <!--link rel="shortcut icon" href="#" /-->
        @yield('head')
      
    </head>
    <body>
        <div id="app" v-cloak>
            @yield('content')
        </div>
        <script src="{{ url(mix('/js/cumbre.js')) }}"></script>
    </body>
</html>