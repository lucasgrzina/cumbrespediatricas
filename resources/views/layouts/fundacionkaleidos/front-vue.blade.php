<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=11">
        <!--meta http-equiv="x-ua-compatible" content="IE=9" -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Fundación Kaleidos</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link href="{{ url(mix('/css/fundacionkaleidos.css')) }}" rel="stylesheet" type="text/css">
        <!-- Minified version of `es6-promise-auto` below. -->
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
        <script>
            window.App = {!! json_encode([
            ]) !!};
        </script>   
        <style>
            .disc-sitio {
                font-size: 11px;
                color: #fff;
                text-align: center;
                font-weight: 300;
                font-family: "gothamlight", sans-serif;
            }            
        </style>
        <!--link rel="shortcut icon" href="#" /-->
        @yield('head')
      
    </head>
    <body>
        <div id="app" v-cloak>
            <header>
                <div class="logo-float"><img src="/img/fundacionkaleidos/logo.png"></div>
            </header>  
            <main>         
                <section>                
                    @yield('content')
                </section>
            </main>
        </div>
        <script src="{{ url(mix('/js/fundacionkaleidos.js')) }}"></script>
    </body>
</html>