@extends('layouts.cumbre.front-vue')
@section('head')
<script src="https://www.google.com/recaptcha/api.js?render={{config('constantes.recaptcha.key','')}}"></script>
@endsection
@section('content')
<!--div class="container-fluid"-->            
<registro v-bind="{{json_encode($props)}}"></registro>
<!--/div-->
@endsection