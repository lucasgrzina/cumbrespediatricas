<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Cumbre Pediátrica</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link href="{{ url(mix('/css/all.css')) }}" rel="stylesheet" type="text/css">

        <script>
            window.App = {!! json_encode([
            ]) !!};
        </script>   
        <link rel="shortcut icon" href="#" />
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
                        <div class="col-4">
                            <a><img src="{{asset('img/logo_3.png')}}"></a>
                        </div>
        
                        <div class="col-4 text-center">
                            <a><img class="logo-cumbre" src="{{asset('img/cumbres_logo.png')}}"></a>
                        </div>
        
                        <div class="col-4">
                            <a><img src="{{asset('img/logo_1.png')}}"></a>
                        </div>
                    </div>
                </div>
            </footer>            
        </div>
        <script src="{{ url(mix('/js/app.js')) }}"></script>
    </body>
</html>