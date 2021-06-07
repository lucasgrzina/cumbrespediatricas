<!doctype html>

<html lang="{{ app()->getLocale() }}">	

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Identidad Digital">
        <meta name="generator" content="AA v3.8.6">
        <title>Abbott</title>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
        
        
        <link href="{{ url(mix('public/assets/abbottrenal/css/styles.min.css')) }}" rel="stylesheet" type="text/css">
        <!-- Minified version of `es6-promise-auto` below. -->
        <!-- script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script-->
        <script>
            window.App = {!! json_encode([
            ]) !!};
        </script>   

        @yield('head')
    
      </head>

    <body>
    
    
        <div id="app" v-cloak>
            @yield('menu')
            <section>

                <div class="container ppal">

                    @yield('content')
                    <div class="row footer-registro">

                        <div class="col-md-12">

                            <p class="text-center mb-3 text-01">Evento dirigido exclusivamente a entrenadores deportivos.</p>

                            <p class="text-center color-celeste text-02">
                                Sitio web optimizado para Navegadores Google Chrome y Firefox (PC/Mac).<br>
                                Se recomienda tener actualizado el sistema operativo a la última actualización.<br>
                                Para una correcta visualización del evento en vivo, usar el modo pantalla completa y activar el sonido en el reproductor.
                            </p>
                        </div>

                    </div>
                </div>

            </section>

        </div>
        <footer class="">
            <!--<a class="logo-footer"><img src="assets/img/abbott-logo.png"></a>-->
            <div class="bottom-background"></div>
        
            <div class="logo-mobile">
                <a href="#" ><img src="{{asset('public/assets/abbottrenal/img/logo.svg')}}"></a>
            </div>
            
        </footer>
        <script src="{{ url(mix('public/assets/abbottrenal/js/app.min.js')) }}"></script>

	</body>

</html>