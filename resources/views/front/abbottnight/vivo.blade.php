@extends('layouts.abbottnight.front-vue')
@section('css')
<link href="{{ url(mix('/css/abbottnight_inicio.css')) }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <vivo v-bind="{{json_encode($props)}}"></vivo>
@endsection