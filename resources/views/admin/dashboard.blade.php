@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-xs-12">
    		<h1>Bienvenido</h1>
    		<p>Seleccioná una opción del menú de la izquierda para comenzar</p>	
    	</div>
	</div>
    <div class="row">
    	<div class="col-sm-12">
			<a href="{{route('admin.previsualizar')}}" class="btn btn-info" target="_blank">Previsualizar</a>
			<a href="{{route('admin.exportar')}}" class="btn btn-primary" target="_blank">Exportar</a>
    	</div>

    </div>	
</div>
@endsection
