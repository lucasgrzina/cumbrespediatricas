@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('admin/crud/css/index.css') }}"/>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        var _data = {!! json_encode($data) !!};
        _data.selectedItem = null;
        _data.selectedIndex = -1;
        _methods.save = function() {
            var _this = this;

            return _this.ajaxPut(_this.url_save.concat('/').concat(_this.selectedItem.id),_this.selectedItem).then(function(data){
                //location.reload();
                _this.$set(_this.list[_this.selectedIndex],'valor',data.valor);
                _this.$set(_this.list[_this.selectedIndex],'modo_edicion',false);

            }); 
        };
        _methods.descEtapa = function(item) {
            var desc = 'Inicio';
            switch (item.valor) {
                case 'R':
                    desc = 'Registro';
                    break;
                case 'F':
                    desc = 'Fin';
                    break;                    
            }
            return desc;
        };

        _methods.edit = function(index) {
            console.debug('edit');
            var _this = this;
            this.selectedIndex = index;
            this.selectedItem = _.clone(_this.list[index]); 
            this.$set(_this.list[_this.selectedIndex],'modo_edicion',true);
        };
        _methods.close = function(index) {
            var _this = this;
            this.$set(_this.list[_this.selectedIndex],'modo_edicion',false);
            this.selectedIndex = null;
        };
        this._mounted.push(function(_this) {
            _this.doFilter();
        });
    </script>
    <script type="text/javascript" src="{{ asset('vendor/vuejs-paginate/vuejs-paginate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/crud/js/index.js') }}"></script>
@endsection

@section('content-header')
{!! AdminHelper::contentHeader('Configuraciones',trans('admin.list')) !!}
@endsection

@section('content')
    @include('admin.components.switches')
    <div class="content">
        <div class="box box-default box-page-list">
            <div class="box-body box-filter">
                <div class="form-inline">
                    @include('admin.includes.crud.index-filters-evento')
                    @include('admin.includes.crud.index-filters-btn')
                </div>
            </div>
            <div class="box-body box-list no-padding">
                    @include('admin.configuraciones.table')
            </div>
            <div class="box-footer">
                <div class="col-sm-8 left">
                    <span v-if="!loading">(% paging.total %) registro(s)</span>
                </div>
                <div class="col-sm-4 right">
                    
                </div>
            </div>
            @include('admin.includes.crud.index-loading')            
        </div>
    </div>
@endsection

