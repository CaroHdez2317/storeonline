@extends('store.template')
	
@section('content')

	<div class="container text-center">
		<div class="page-header"><br><br>
			<h1><i class="fa fa-ticket"></i> Mis Pedidos</h1><hr>
		</div><br>
	<strong>
		<div class="table-cart">
			<table class="table table-ligth table-hover">
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Total</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $orden)
					<tr>
						<td>{{ $orden->created_at }}</td>
                        <td>${{ number_format($orden->subtotal) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</strong>
	</div>
@stop