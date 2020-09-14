<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=9">
        <!--meta http-equiv="x-ua-compatible" content="IE=9" -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Danone Day</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link href="{{ url(mix('/css/danoneday.css')) }}" rel="stylesheet" type="text/css">
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
    <body id="body" class="home">
        <div id="app" v-cloak>
            <header></header>            
            <main>
                @yield('content')
            </main>
            <footer class=""></footer>            
        </div>
        <script src="{{ url(mix('/js/danoneday.js')) }}"></script>
    </body>
</html>