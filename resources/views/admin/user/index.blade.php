@extends('admin.template')

@section('content')

	<div class="container text-center">
		<div class="page-header"><br><br>
			<h1><i class="fa fa-user"></i>Usuarios</h1><hr>
		</div><br>
	</div>
	<div class="container">
		<a href="{{route('user-add')}}" class="btn btn-success"><i class="fa fa-plus-square-o"></i> Agregar usuario</a>
	</div>
	<div class="page">
		<div class="table-responsive table-cart">
			<table class="table table-ligth table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Correo</th>
						<th>Administrador</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->last_name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->type == 1 ? "Si" : "No"}}</td>
						<td>
							<a href="{{route('user-edit', [$user->id])}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
						</td>
						<td>
							<form method="post" action="{{route('user-dele', [$user->id])}}" class="form-delete">
							@csrf
								<input type="hidden" name="_method" value="delete">
								<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o "></i></button>
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table><hr>
		</div>
		<hr>
			<?php echo $users->render(); ?>
	</div><hr>

@stop
