@extends('front.mentesinlimites.template')
@section('content')
<vivo v-bind="{{json_encode($props)}}"></vivo>
@endsection