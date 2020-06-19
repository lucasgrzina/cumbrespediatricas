@extends('layouts.front-vue')
@section('head')
<script src="https://www.google.com/recaptcha/api.js?render=6Leb2qYZAAAAALa7WyEDFhvJUYlYQH4Z_CJ-U-ie"></script>
@endsection
@section('content')
<div class="container">            
<registro v-bind="{{json_encode($props)}}"></registro>
</div>
@endsection