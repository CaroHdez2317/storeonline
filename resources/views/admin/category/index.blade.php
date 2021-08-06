@extends('admin.template')

@section('content')

	<div class="container text-center">
		<div class="page-header"><br><br>
			<h1> <i class="fa fa-list-alt"></i> Categorías</h1><hr>
		</div>
	</div>
		<div class="container">
			<a href="{{route('cate-add')}}" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Agregar categoría</a>
		</div>
		<div class="page">
			<div class="table-cart table-responsive">
				<table class="table table-ligth table-hover">
				
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Color</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
							<tr>
								<td>{{$category->name}}</td>
								<td>{{$category->description}}</td>
								<td>{{$category->color}}</td>
								<td>
									<a href="{{route('category_edit', [$category->id])}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
								</td>
								<td>
									<form method="post" action="{{route('category_delete', [$category->id])}}" class="form-delete">
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
			<?php echo $categories->render(); ?>
		</div><hr>
	</div>

@stop