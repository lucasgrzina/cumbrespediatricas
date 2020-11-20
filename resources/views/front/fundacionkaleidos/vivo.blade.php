@extends('layouts.fundacionkaleidos.front-vue')
@section('head')
    <script>
        var _data = {!!json_encode($props)!!};
    </script>
@endsection
@section('content')
<div class="container vivo">            
    <vivo v-bind="{{json_encode($props)}}"></vivo>
</div>
@endsection