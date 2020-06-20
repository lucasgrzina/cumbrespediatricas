@extends('layouts.app')
@section('scripts')
    @parent
    <script type="text/javascript">
		var _data = {!! json_encode($data) !!};
		
		_methods.habilitarEncuesta = function () {
			console.debug(this.encuesta);
			var _this = this;
			var _ajaxMethod =  _this.ajaxPost ;
			return _ajaxMethod(_this.url_save,{encuesta: _this.encuesta},true,_this.errors).then(function(data){
				console.debug(data);
			});                            
		};
    </script>
@endsection
@section('content')
<div class="container">
    <div class="row">
    	<div class="col-xs-12">
    		<h1>Bienvenido</h1>
    		<p>Seleccioná una opción del menú de la izquierda para comenzar</p>	
    	</div>
	</div>
    <div class="row">
    	<div class="col-xs-12">
    		<h2>Configuraciones</h2>
    		<p>
				<input type="checkbox" name="encuesta" id="encuesta" value="1" v-model="encuesta" @change="habilitarEncuesta"> Habilitar encuesta
			</p>	
    	</div>
	</div>	
</div>
@endsection
