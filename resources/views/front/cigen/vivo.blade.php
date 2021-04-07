@extends('layouts.cigen.front-vue')
@section('head')
<link href="{{ url('/css/cigen/speakers.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<vivo v-bind="{{json_encode($props)}}"></vivo>
@endsection