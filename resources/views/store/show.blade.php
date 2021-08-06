@extends('store.template')
@section('content')
<div class="container">
    <div class="page-header"><br><br>
      <h1><i class="fa fa-shopping-cart"></i>Detalle del Producto</h1><hr>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="product-block">
		        <img src="{{$product->foto}}">
	        </div>
        </div>
        <div class="col-md-6">
            <div class="product-block">
                <h3>{{ $product->name }}</h3>
                <div class="product-info">
                    <p>{{ $product->description }}</p>
                    <h3>
                        <span class="label">Precio: ${{ number_format($product->price,2) }} </span>
                    </h3>
                </div>
                    @auth
                    <p>
                        <a class="btn btn-success btn-block" href="{{ route('cart-add', $product->slug ) }}">Agregar al carrito
                            <i class="fa fa-cart-plus fa-2x"></i>
                        </a>
                    </p>
                    @endauth
                    <p>
                        <a class="btn btn-primary btn-block btn-sm" href="{{ route('home') }}"><i class="fa fa-chevron-circle-left"></i> Regresar</a>
                    </p>
	        </div>

        </div>
    </div>
<hr>
</div>
@stop