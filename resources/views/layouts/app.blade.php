<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" href="{{asset('img/cropped-favicon-32x32.png')}}" sizes="32x32" />
    <link rel="icon" href="{{asset('img/cropped-favicon-192x192.png')}}" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="{{asset('img/cropped-favicon-180x180.png')}}" />
    <meta name="msapplication-TileImage" content="{{asset('img/cropped-favicon-270x270.png')}}" />    
    <link rel="manifest" href="{{asset('admin/img/site.webmanifest')}}">


    @if (Auth::check('admin'))
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap-3.3.7/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/utils.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/skin-adminlte.css') }}">

        <script type="text/javascript">
                var _csrfToken = '{!! csrf_token() !!}';
                var _methods = {};
                var _components = {};
                var _dictionary = {
                  es: {
                    messages: {
                      _default: 'El campo no es válido.',
                      required: 'El campo es obligatorio.',
                      email: 'El campo debe ser un correo electrónico válido.',
                      regex: 'El formato ingresado es incorrecto'
                    },
                    custom: {
                      password: {
                        confirmed: 'Las contraseñas ingresadas no coinciden',
                      }
                    }    
                  }
                };
                var _generalData = {
                    alert: {
                        show: false,
                        type: '',
                        title: false,
                        message: ''
                    },
                    lang: {!! json_encode( trans('admin') ) !!}
                };
                var _mounted = [];            
        </script>

    @else
        <!-- JS DE FRONT -->
    @endif
    @yield('css')
</head>

<body class="skin-adminlte-light sidebar-mini">
@if (Auth::check('admin'))
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <!--img src="{{asset('admin/img/logo_finba.png')}}"/-->
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <i class="fas fa-bars"></i><span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{!! asset('admin/img/user.png') !!}"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->username !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{!! asset('admin/img/user.png') !!}"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->nombre_completo !!}
                                        <small>Member since {!! Auth::user()->created_at->format('M. Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="text-center">
                                        <a href="{!! route('admin.logout') !!}" class="btn btn-default btn-flat">
                                            Sign out
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"  id="app" v-cloak>
            @yield('content-header')
            <div class="clearfix"></div>
            <div v-show="alert.show" class="alert alert-dismissible m-20" style="margin: 10px;" :class="{'alert-danger': alert.type == 'E','alert-warning': alert.type == 'W','alert-info': alert.type == 'I','alert-success': alert.type == 'S'}">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4 v-if="alert.title">(% alert.title %)!</h4>
                    <i class="icon fa" :class="{'fa-ban': alert.type == 'E','fa-exclamation-triangle': alert.type == 'W','fa-info': alert.type == 'I','fa-check': alert.type == 'S'}"></i> (% alert.message %)
            </div>    
            @yield('content')
        </div>


        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2017. All rights reserved.</strong>
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    Abra Auto
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/home') !!}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/login') !!}">Login</a></li>
                    <li><a href="{!! url('/register') !!}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@endif

    <!-- jQuery 3.1.1 -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    @if (Auth::check('admin'))    
        <!--script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script-->
        <!--script src="//cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script-->
        <script src="{{ asset('vendor/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('vendor/adminlte/js/app.min.js') }}"></script>
        <script src="{{ asset('vendor/vue.js') }}"></script>
        <script src="{{ asset('vendor/vue-cookies.js') }}"></script>
        <script src="{{ asset('vendor/vue-resource.min.js') }}"></script>
        <script src="{{ asset('vendor/vue-strap.min.js') }}"></script>
        <script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
        <script src="{{ asset('admin/js/button-type.js') }}"></script>

    @else
    @endif
    
    @yield('scripts')
    <script src="{{ asset('admin/js/template.js') }}"></script>


</body>
</html>