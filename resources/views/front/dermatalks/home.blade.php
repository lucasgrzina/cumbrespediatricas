@extends('layouts.dermatalks.front')
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
		<img src="{{ asset('img/std_v2.jpg') }}" style="width:100%;max-width:1024px;"/>				
		@endif
	</div>	
</div>
@endsection