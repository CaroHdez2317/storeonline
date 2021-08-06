@extends('admin.template')

@section('content')

<br><br>
<div class="container text-center table-cart">
	<div class="page-header"><br>
		<h2>Bienvenido(a) {{ Auth::user()->name }} al panel de administración.</h2><hr>
	</div>

	<div class="row ">
		<div class="col-md-6">
			<div class="panel">
				<i class="fa fa-list-alt icon-home"></i>
				<a href="{{route('home-cate')}}" class="btn bnt-warning btn-block btn-home-admin">Categorías</a>
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel">
				<i class="fa fa-shopping-cart icon-home"></i>
				<a href="{{route('index-produ')}}" class="btn bnt-warning btn-block btn-home-admin">Productos</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="panel">
				<i class="fa fa-list icon-home"></i>
				<a href="{{route('index-order')}}" class="btn bnt-warning btn-block btn-home-admin">Pedidos</a>
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel">
				<i class="fa fa-users icon-home"></i>
				<a href="{{route('index-user')}}" class="btn bnt-warning btn-block btn-home-admin">Usuarios</a>
			</div>
		</div>
	</div>

</div>

@stop