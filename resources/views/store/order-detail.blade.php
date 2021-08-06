@extends('store.template')
@section('content')

	<div class="container text-center">
		<div class="page-header"><br><br>
			<h1><i class="fa fa-paperclip"></i> Detalle del pedido</h1><hr>
		</div>

		<div class="page">

			<!--User details-->
			<div class="table-cart">
				<h3><i class="fa fa-address-card"></i> Datos del usuario</h3>
				<table class="table table-striped table-hover table-bordered">
					<tr><td>Nombre: </td><td>{{Auth::user()->name}} {{Auth::user()->last_name}}</td></tr>
					<tr><td>Correo: </td><td>{{Auth::user()->email}}</td></tr>
				</table>
			</div>

			<!--Order details-->
			<div class="table-cart">
				<h3><i class="fa fa-list-ul"></i> Datos del pedido</h3>
				<table class="table table-striped table-hover table-bordered">
					<tr>
						<th>Producto</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Subtotal</th>
					</tr>

					@foreach($cart as $item)
					<tr>
						<td>{{$item->name}}</td>
						<td>$ {{ number_format($item->price,2)}}</td>
						<td>{{$item->quantity}}</td>
						<td>$ {{ number_format($item->price * $item->quantity, 2)}}</td>
					</tr>
					@endforeach
				</table>
				<hr>
				<h3>
					<span class="badge badge-success">
						Total: ${{number_format($total, 2)}}
					</span>
				</h3>
				
				<p>
					<a href="{{route('cart-show')}}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Regresar</a>
					<a href="{{route('getOrder')}}" class="btn btn-warning"><i class="fa fa-envelope"> Enviar pedido</i></a>
				</p>
			</div>

		</div>
	</div>

@stop