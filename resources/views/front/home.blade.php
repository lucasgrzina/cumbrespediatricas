@extends('layouts.front')
@section('scripts')
    @parent
	<script type="text/javascript">

	</script>	
@endsection
@section('content')
	<section class="filters">
		<div class="container">
			<div class="row">			
				<div id="navbar" class="col-md-12 content-filters">
						@php
							$nroColCat = 1;
							$divisible = 20;
						@endphp
						<div class="logo-texto-nav row">
							<div class="logo-nav col-md-2">
								<a href="#" class="logo"><img src="{{ $carpetaAssetsEstaticos.'img/logo.png' }}" /></a>
							</div>
							<div class="texto-nav col-md-10">
								<h1>ESTOS SON LOS PRODUCTOS QUE TENEMOS DISPONIBLES PARA QUE LE PIDAS A TU CANILLITA</h1>
							</div>
						</div>
						<div class="menu-nav container-fluid d-md-flex justify-content-around">
						@foreach ($menuCategorias as $cat)
							<div class="dropdown nav-desktop">
								<a class="btn btn-primary rounded-0 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									{{ $cat['nombre'] }}
								</a>
								
								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									@foreach ($cat['secciones'] as $seccionId => $seccionNombre)
										<a class="dropdown-item" href="#cat-{{$cat['id']}}-sec-{{$seccionId}}">{{$seccionNombre}}</a>	
									@endforeach
								</div>
							</div>					

							@php
								$nroColCat++;
							@endphp
						@endforeach
					</div>
					<nav class="navbar navbar-expand-lg navbar-light bg-light nav-mobile">
					<a class="navbar-brand" href="#"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							@php
								$nroColCat = 1;
								$divisible = 20;
							@endphp
		
							@foreach ($menuCategorias as $cat)
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										{{ $cat['nombre'] }}
									</a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
										@foreach ($cat['secciones'] as $seccionId => $seccionNombre)
											<a class="dropdown-item" href="#cat-{{$cat['id']}}-sec-{{$seccionId}}">{{$seccionNombre}}</a>	
										@endforeach
									</div>
								</li>
								@php
									$nroColCat++;
								@endphp
							@endforeach
						</ul>
					</div>									
						

				</nav>	
				</div>
			</div>
		</div>
	</section>

	<section class="catalog">
		<div class="container">

			@foreach ($contenido as $categoria)
			<!--span class="nombre-categoria btn-primary">{{$categoria->nombre}}</span-->
				<section id="cat-{{$categoria->id}}">
					@foreach ($categoria->secciones as $seccion)

						@if (count($seccion->productos) > 0)
							<div class="row" id="cat-{{$categoria->id}}-sec-{{$seccion->id}}">
								<div class="col-md-12">
									<h1>{{ $seccion->nombre }}</h1>
								</div>
							</div>
					
							<div class="row">
								@foreach ($seccion->productos as $producto)
									<div class="col-lg-2 col-md-4 col-sm-6 col-6">
										<div class="product">
											<div class="product-grid text-right" style="background-image: url({{$carpetaAssetsProductos.$producto->imagen}});">
												<div class="price"><span>$</span>{{$producto->precio_partes[0]}}<small class="cents">{{$producto->precio_partes[1]}}</small></div>
												<div class="product-image">
												
												</div>
												<div class="product-content">
													<p class="title">{{$producto->nombre}}</p>
													<p class="cod">{{$producto->codigo}}</p>
												</div>	
											</div>
										</div>
									</div>
								@endforeach
							</div>
						@endif
					@endforeach
				</section>
			@endforeach

		</div>
	</section>
@endsection