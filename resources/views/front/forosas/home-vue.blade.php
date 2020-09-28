@extends('layouts.forosas.front-vue')
@section('head')
<!--script src="https://www.google.com/recaptcha/api.js?render={{config('constantes.recaptcha.key','')}}"></script-->
@endsection
@section('content')
<home v-bind="{{json_encode($props)}}"></home>
@endsection