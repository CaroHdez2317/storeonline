@extends('admin.template')

@section('content')

	<div class="container text-center">
		<div class="page-header"><br><br>
			<h1><i class="fa fa-credit-card"></i>Pedidos</h1><hr>
		</div><br>
		
		<div class="table-cart">
			<table class="table table-ligth table-hover">
				<thead>
					<tr>
						<th>Ver detalle</th>
						<th>Nombre</th>
						<th>Fecha</th>
						<th>Total</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    <a 
                                        href="#" 
                                        class="btn btn-primary btn-detalle-pedido"
                                        data-id="{{ $order->id }}"
                                        data-path="{{ route('getItemsOrder')}}"
                                        data-toggle="modal" 
                                        data-target="#myModal"
                                        data-token="{{ csrf_token() }}"
                                    >
                                        <i class="fa fa-external-link"></i>
                                    </a>
                                </td>
                                <td>{{ $order->user->name }} {{ $order->user->last_name }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>${{ number_format($order->subtotal) }}</td>
                                <td><form method="post" action="{{route('order-dele', [$order->id])}}" class="form-delete">
										@csrf
										<input type="hidden" name="_method" value="delete">
										<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o "></i></button>
									</form></td>
                            </tr>
                        @endforeach
				</tbody>
			</table>
		</div>
	</div>
	@include('admin.partials.modal-detalle-pedido')
@stop