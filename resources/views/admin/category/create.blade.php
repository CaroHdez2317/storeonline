@extends('admin.template')

@section('content')

<div class="container"><br><br>
	<div class="row justify-content-center">
		<div class="col-md-offset-3 col-md-6">
		    <div class="page-header text-center">
	          <h1 style="color: #000;"><i class="fa fa-list-alt"></i> Registar categoría</h1><hr>
	        </div>

				<div class="page table-cart">
					<form method="POST" action="{{route('store-category')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right"><i class="fa fa-vcard"></i> {{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Ejemplo:Varios">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right"><i class="fa fa-info-circle"></i> {{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required placeholder="Ejemplo:Distintas variedades">

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="color" class="col-md-4 col-form-label text-md-right"><i class="fa fa-paint-brush"></i> {{ __('Color') }}</label>

                            <div class="col-md-6">
                                <input id="color" type="color" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" name="color" value="{{isset($category->color) ? $category->color:null}}"  required>

                                @if ($errors->has('color'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   <i class="fa fa-save"></i> 
                                    {{ __('Guardar') }}
                                </button>
                                <a href="{{route('home-cate')}}" class="btn btn-danger"><i class="fa fa-ban"></i>Cancelar</a>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>

@stop