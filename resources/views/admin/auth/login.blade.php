<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <link rel="icon" href="{{asset('img/cropped-favicon-32x32.png')}}" sizes="32x32" />
    <link rel="icon" href="{{asset('img/cropped-favicon-192x192.png')}}" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="{{asset('img/cropped-favicon-180x180.png')}}" />
    <meta name="msapplication-TileImage" content="{{asset('img/cropped-favicon-270x270.png')}}" />    

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition login-page" style="background:#0fd7e2!important;">
<div class="login-box">

    <!-- /.login-logo -->
    <div class="login-box-body" style="
        border: 1px solid #d2d6de;
        background: #d2d6de;
        border-radius: 10px;
    ">
        <h4 style="
        text-align: center;
        margin-bottom: 20px;
        ">Administrador</h4>

        <form method="post" action="{{ route('admin.login.submit') }}">
            {!! csrf_field() !!}
            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

            </div>
            <div class="row">
                <div class="col-xs-8 col-md-5 col-md-offset-1">
                    <div class="checkbox icheck" style="visibility: hidden;">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4  col-md-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
		<!--a href="{{ url('/password/email') }}" style="margin-left: 10px">Olvidé mi password</a--><br>
        
        

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<!-- AdminLTE App -->
<script src="//cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>
<script>
    $(function () {
           });
</script>
</body>
</html>
