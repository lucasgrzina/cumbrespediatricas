@extends('layouts.similacmama.front-vue')
@section('content')
<div class="container vivo">            
    <vivo v-bind="{{json_encode($props)}}"></vivo>
</div>
@endsection