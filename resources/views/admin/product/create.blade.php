@extends('admin.template')

@section('content')

<div class="container"><br><br>
	<div class="row justify-content-center">
		<div class="col-md-offset-3 col-md-6">
		    <div class="page-header text-center">
	          <h1 style="color: #000;"><i class="fa fa-user"></i> Registar producto</h1><hr>
	        </div>

				<div class="pag table-cart">
					<form method="POST" action="{{route('store-produ')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                            <div class="col-md-6">
                                <input id="category_id" type="select" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required autofocus>

                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Bomba">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Extracto') }}</label>

                            <div class="col-md-6">
                                <input id="extract" type="extract" class="form-control{{ $errors->has('extract') ? ' is-invalid' : '' }}" name="extract" value="{{ old('extract') }}" required placeholder="Bomba">

                                @if ($errors->has('extract'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('extract') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required placeholder="Breve descripcion">

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="quantity" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{ old('quantity') }}" required placeholder="15">

                                @if ($errors->has('quantity'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required placeholder="$1500.00">

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" required>

                                @if ($errors->has('foto'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> {{ __('Guardar') }}
                                </button>
                                <a href="{{route('index-produ')}}" class="btn btn-danger"><i class="fa fa-ban"></i>Cancelar</a>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>

@stop