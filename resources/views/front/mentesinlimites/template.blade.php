<!doctype html>

<html lang="{{ app()->getLocale() }}">

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
    
        <meta name="author" content="Identidad Digital">
    
        <meta name="generator" content="AA v3.8.6">
        <title>Por una mente sin límites</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

        <link href="{{ url(mix('public/assets/mentesinlimites/css/styles.min.css')) }}" rel="stylesheet" type="text/css">
        <!-- Minified version of `es6-promise-auto` below. -->
        <!-- script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script-->
        <script>
            window.App = {!! json_encode([
            ]) !!};
        </script>   

        @yield('head')
    
      </head>

    <body class="">
    
    
            <section id="app" v-cloak>
                @yield('content')
                
            </section>
            <footer class="">

                <div class="col-footer color-1"></div>
            
                <div class="col-footer color-2"></div>
            
                <div class="col-footer color-3"></div>
            
            </footer>
        <script src="{{ url(mix('public/assets/mentesinlimites/js/app.min.js')) }}"></script>
<!-- Código de instalación Cliengo para ivan.schwindt@gmail.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/60e4b7e07fdced002ad68ddb/60e4b7e27fdced002ad68de2.js?platform=view_installation_code'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>
        @yield('foot')
    </body>

</html>