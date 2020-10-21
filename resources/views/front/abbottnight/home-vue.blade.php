@extends('layouts.abbottnight.front-vue')
@section('css')
<link href="{{ url(mix('/css/abbottnight.css')) }}" rel="stylesheet" type="text/css">
@endsection
@section('content')

<home v-bind="{{json_encode($props)}}"></home>
@endsection