@extends('layouts.fundacionkaleidos.front')
@section('head')
    @parent
	<script type="text/javascript">
		var data = {!!json_encode($data)!!};
		
	</script>	
@endsection
@section('content')
<div class="row h-100">
	<div class="col text-center justify-content-center align-self-center">
		@if($data['config']['etapa'] === 'F')
			<img src="{{ asset('img/muchas graciasjpg-01.jpg') }}" style="width:100%;max-width:1024px;"/>				
		@else
		<img src="{{ asset('img/fundacionkaleidos/flyer_web.jpg') }}" style="width:100%;" class="fondo-web"/>				
		<img src="{{ asset('img/fundacionkaleidos/flyer.jpg') }}" style="width:100%;max-width:1024px;" class="fondo-mobile"/>
		@endif
	</div>	
</div>
@endsection