@extends('layouts.front-vue')
@section('content')
<div class="container encuesta">            
    <encuesta v-bind="{{json_encode($props)}}"></encuesta>
</div>
@endsection