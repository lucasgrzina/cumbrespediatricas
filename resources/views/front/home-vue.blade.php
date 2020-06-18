@extends('layouts.front-vue')
@section('content')
<div class="container">            
<registro v-bind="{{json_encode($props)}}"></registro>
</div>
@endsection