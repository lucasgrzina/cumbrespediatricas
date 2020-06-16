@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('admin/crud/css/show.css') }}"/>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        var _data = {!! json_encode($data) !!};
    </script>
    <script type="text/javascript" src="{{ asset('admin/crud/js/show.js') }}"></script>
@endsection

@section('content-header')
{!! AdminHelper::contentHeader('Users', trans('admin.show'),'back','goTo(url_index)') !!}
@endsection

@section('content')
    <div class="content">
        <div class="box box-default box-show">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.registrados.show_fields')
                </div>
            </div>
            <div class="box-footer text-right">
                <button-type type="edit" @click="goTo(url_edit)"></button-type>
            </div>            
        </div>
    </div>    
@endsection