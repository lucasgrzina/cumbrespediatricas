@extends('layouts.danoneday.front')
@section('head')
    @parent
	<style>
		body {
			background-color: #f7fbfe!important;
		}
		.img-std {
				width:100%;
		}		
		@media (max-width:1450px) {
			.img-std {
				width:100%;
				max-width: 1150px;
			}
		}
	</style>
		
	<script type="text/javascript">
		var data = {!!json_encode($data)!!};
		
	</script>	
@endsection
@section('content')
<div class="row h-100">
	<div class="col text-center justify-content-center align-self-center my-auto">
		@if($data['config']['etapa'] === 'F')
			<!--img src="{{ asset('img/muchas graciasjpg-01.jpg') }}" style="width:100%;max-width:1024px;"/-->				
		@else
		<img src="{{ asset('img/std_danoneday_2.jpg') }}" class="img-std"/>				
		@endif
	</div>	
</div>
@endsection