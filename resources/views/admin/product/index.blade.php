@extends('admin.template')

@section('content')

	<div class="container text-center">
		<div class="page-header"><br><br>
			<h1><i class="fa fa-product-hunt"></i>Productos</h1><hr>
		</div>
	</div>
		<div class="container">
			<a href="{{route('produ-add')}}" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Agregar producto</a>
		</div>
		<div class="page">
			<div class="table-cart table-responsive">
				<table class="table table-ligth table-hover">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Nombre</th>
							<th>Categoría</th>
							<th>Descripción</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
							<tr>
								<td><img src="img/{{$product->foto->ruta}}"></td>
								<td>{{$product->name}}</td>
								<td>{{$product->category->name}}</td>
								<td>{{$product->extract}}</td>
								<td>{{$product->quantity}}</td>
								<td>$ {{number_format($product->price,2)}}</td>
								<td>
									<a href="{{route('product-edit', [$product->id])}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
								</td>
								<td>
									<form method="post" action="{{route('product-dele', [$product->id])}}" class="form-delete">
										@csrf
										<input type="hidden" name="_method" value="delete">
										<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o "></i></button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<hr>
			<?php echo $products->render(); ?>
		</div><hr>
	</div>

@stop