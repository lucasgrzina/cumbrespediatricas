@extends('layouts.app')
@section('scripts')
    @parent
    <script type="text/javascript">
		var _data = {!! json_encode($data) !!};
		
		_methods.guardarConfig = function () {
			console.debug(this.config);
			var _this = this;
			var _ajaxMethod =  _this.ajaxPost ;
			return _ajaxMethod(_this.url_save,{config:_this.config},true,_this.errors).then(function(data){
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
			<p>Seleccioná una opción del menú de la izquierda para comenzar. Hora actual: {{\Carbon\Carbon::now()->format('Y-m-d H:i:s')}}</p>	
    	</div>
	</div>
    <div class="row">
    	<div class="col-xs-6">
			<h2>Configuraciones</h2>
			<p>
				<div class="form-group">
					<label for="lst-etapas">Etapa</label>
					<select id="lst-etapas" name="lst-etapas" class="form-control" v-model="config.etapa">
						<option :value="'I'">Inicio (JPG)</option>
						<option :value="'R'">Registro/Vivo</option>
						<option :value="'F'">Fin (Placa)</option>
					</select>
				</div>

			</p>
    		<p v-if="config.etapa === 'R'">
				<label style="margin-right: 10px;">Habilitar encuesta:</label>
				<input type="radio" id="encuesta_si" value="1" v-model="config.encuesta">
				<label for="encuesta_si" style="margin-right: 10px;">SI</label>
				
				<input type="radio" id="encuesta_no" value="0" v-model="config.encuesta">
				<label for="encuesta_no">NO</label>				
			</p>
			<p>
				<button class="btn btn-primary" @click="guardarConfig" type="button">Guardar</button>
			</p>	
    	</div>
	</div>	
</div>
@endsection
