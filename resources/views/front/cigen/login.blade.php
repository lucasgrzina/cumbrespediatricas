@extends('layouts.cigen.front-vue')
@section('head')
<script src="https://www.google.com/recaptcha/api.js?render={{config('constantes.recaptcha.key','')}}"></script>
@endsection
@section('content')
<login v-bind="{{json_encode($props)}}"></login>
@endsection