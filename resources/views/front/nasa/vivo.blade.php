@extends('layouts.nasa.front-vue')
@section('content')
    <vivo v-bind="{{json_encode($props)}}"></vivo>
@endsection