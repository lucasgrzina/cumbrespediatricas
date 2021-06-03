@extends('front.trainsmart.template')
@section('menu')
    @include('front.trainsmart.includes.menu')
@endsection
@section('content')
<vivo v-bind="{{json_encode($props)}}"></vivo>
@endsection