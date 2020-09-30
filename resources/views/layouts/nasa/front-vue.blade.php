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
            body {
                background-image: url(../img/nasa/fondo.jpg)!important;
                background-color: #000000!important;
            }
            .contenedor_vimeo {
                position: relative;
                padding-bottom: 56.25%;
                padding-top: 25px;
                height: 0;
                border: 2px solid #efb854;
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
            <header class="">
    	
            </header>            
            <section>
                
                    @yield('content')
                
            </section>
            <footer class="">
                <div class="container">
                    <div class="row logos">
                        <div class="col-12 text-center">
                            <img class="logo-cumbre" style="height: auto; max-width: 450px;" src="{{asset('img/nasa/logos.png')}}">
                        </div>
                    </div>
                </div>
            </footer>            
        </div>
        <script src="{{ url(mix('/js/cumbre.js')) }}"></script>
    </body>
</html>