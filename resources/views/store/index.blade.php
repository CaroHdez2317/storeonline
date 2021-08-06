@extends('store.template')

@section('content')

@include('store.partials.slider')

<div class="container text-center">
	<div class="row">

		<div class="col-md-3 aside">
			@include('store.partials.aside')
		</div>

		<div class="col-md-9">
			<div id="products">
			@if (isset($products))
				@foreach($products as $product)
				<div class="product white-panel">
		            <h4>{{ $product->name }}</h4><hr>
                   <img src="img/{{$product->foto->ruta}}" alt="foto" width="200">
					<div class="product-info panel">
						<h4><span class="label">Precio: ${{ number_format($product->price,2) }} </span></h4>
						<p>
							@auth
							<a class="btn btn-success" href="{{ route('cart-add', $product->slug ) }}">
							<i class="fa fa-cart-plus"></i> Agregar</a>
							@endauth
							<a class="btn btn-primary" href="{{ route('product-detail', $product->slug) }}">Leer más <i class="fa fa-chevron-circle-right"></i> </a>
						</p>
					</div>
				</div>	
				@endforeach
            @endif
			</div>	
		</div>

	</div>
	<hr>
	@if (isset($products))
	    <?php echo $products->render(); ?>
    @endif
</div>
@stop