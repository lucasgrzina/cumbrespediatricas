<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=9">
        <!--meta http-equiv="x-ua-compatible" content="IE=9" -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Simila</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link href="{{ url(mix('/css/similacmama.css')) }}" rel="stylesheet" type="text/css">
        <!-- Minified version of `es6-promise-auto` below. -->
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
        <script>
            window.App = {!! json_encode([
            ]) !!};
        </script>   
        <!--link rel="shortcut icon" href="#" /-->
        @include('front.includes.ga')
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
                <!--div class="container">
                    <div class="row logos">
                        <div class="col-4" style="padding-top: 10px;text-align:center;">
                            <a><img src="{{asset('img/logo_3.png')}}" style="height: auto; max-width: 160px;"></a>
                        </div>
        
                        <div class="col-4 text-center">
                            <img class="logo-cumbre" style="height: auto; max-width: 180px;" src="{{asset('img/cumbres_logo.png')}}">
                        </div>
        
                        <div class="col-4">
                            <a><img src="{{asset('img/logo_1.png')}}" style="height: auto; max-width: 180px;"></a>
                        </div>
                    </div>
                </div-->
            </footer>            
        </div>
        <script src="{{ url(mix('/js/similacmama.js')) }}"></script>
    </body>
</html>