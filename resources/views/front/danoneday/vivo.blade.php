@extends('layouts.danoneday.front-vue')
@section('head')
    <script>
        var _data = {!!json_encode($props)!!};
    </script>
@endsection
@section('content')
<vivo v-bind="{{json_encode($props)}}"></vivo>
@endsection