@extends('layouts.abbottnight.front-vue')
@section('css')
<link href="{{ url(mix('/css/abbottnight_inicio.css')) }}" rel="stylesheet" type="text/css">
@endsection
@section('head')
<script src="https://www.google.com/recaptcha/api.js?render={{config('constantes.recaptcha.key','')}}"></script>
@endsection
@section('content')
<registro v-bind="{{json_encode($props)}}"></registro>
@endsection