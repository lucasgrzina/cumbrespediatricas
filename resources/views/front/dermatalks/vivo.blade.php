@extends('layouts.dermatalks.front-vue')
@section('head')
    @parent
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
@endsection
@section('content')
<div class="container vivo">            
    <vivo v-bind="{{json_encode($props)}}"></vivo>
</div>
@endsection