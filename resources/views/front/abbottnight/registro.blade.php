@extends('layouts.abbottnight.front-vue')
@section('head')
<script src="https://www.google.com/recaptcha/api.js?render={{config('constantes.recaptcha.key','')}}"></script>
@endsection
@section('content')
<registro v-bind="{{json_encode($props)}}"></registro>
@endsection