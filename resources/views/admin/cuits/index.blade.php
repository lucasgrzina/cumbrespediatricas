@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('admin/crud/css/index.css') }}"/>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        var _data = {!! json_encode($data) !!};

        this._mounted.push(function(_this) {
            _this.doFilter();
        });
    </script>
    <script type="text/javascript" src="{{ asset('vendor/vuejs-paginate/vuejs-paginate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/crud/js/index.js') }}"></script>
@endsection

@section('content-header')
{!! AdminHelper::contentHeader('Cuits rechazados',trans('admin.list'),'new','create()') !!}
@endsection

@section('content')
    @include('admin.components.switches')
    <div class="content">
    
        <div class="box box-default box-page-list">
            <div class="box-body box-filter">
                @include('admin.includes.crud.index-filters')
            </div>
            <div class="box-body box-list no-padding">
                    @include('admin.cuits.table')
            </div>
            <div class="box-footer text-center">
                @include('admin.includes.crud.index-pagination')                            
            </div>
            @include('admin.includes.crud.index-loading')            
        </div>
    </div>
@endsection