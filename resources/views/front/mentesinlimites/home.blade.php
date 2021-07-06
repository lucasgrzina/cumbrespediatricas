@extends('front.mentesinlimites.template')
@section('head')
<script src="https://www.google.com/recaptcha/api.js?render={{config('constantes.recaptcha.key','')}}"></script>
@endsection
@section('content')
<!--div class="row">
    <div class="col-12 pt-4">
        <img src="{{asset('public/assets/mentesinlimites/img/invitacion.jpg')}}" class="img-fluid">
    </div>
</div-->
<registro v-bind="{{json_encode($props)}}"></registro>
@endsection