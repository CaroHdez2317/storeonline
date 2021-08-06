	
@extends('admin.template')

@section('content')
	<div class="container"><br><br>
	    <div class="page-header text-center">
	          <h1 style="color: #000;"><i class="fa fa-pencil-square-o"></i> Registrar usuario</h1><hr>
	    </div>   
	</div>

	<div class="page">
	                    <form method="POST" action="{{ route('store-user') }}">
	                        @csrf

	                        <div class="form-group row">
	                            <label for="name" class="col-md-4 col-form-label text-md-right"><i class="fa fa-vcard-o"></i> {{ __('Nombre') }}</label>

	                            <div class="col-md-6">
	                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Juan">

	                                @if ($errors->has('name'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="name" class="col-md-4 col-form-label text-md-right"><i class="fa fa-vcard"></i> {{ __('Apellido') }}</label>

	                            <div class="col-md-6">
	                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus placeholder="Pérez">

	                                @if ($errors->has('last_name'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('last_name') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="email" class="col-md-4 col-form-label text-md-right"><i class="fa fa-envelope"></i> {{ __('E-Mail') }}</label>

	                            <div class="col-md-6">
	                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="ejemplo@gmail.com">

	                                @if ($errors->has('email'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fa fa-lock"></i> {{ __('Contraseña') }}</label>

	                            <div class="col-md-6">
	                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="******">

	                                @if ($errors->has('password'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><i class="fa fa-lock"></i> {{ __('Confirmar contraseña') }}</label>

	                            <div class="col-md-6">
	                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="******">
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="type" class="col-md-4 text-md-right checkbox-inline">{{ __('Administrador') }}</label>

	                            <div class="col-md-6">
	                                <input id="type" type="checkbox" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="$user->type">

	                                @if ($errors->has('type'))
	                                    <span class="invalid-feedback">
	                                        <strong>{{ $errors->first('type') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>

	                        <div class="form-group row mb-0">
	                            <div class="col-md-6 offset-md-4">
	                                <button type="submit" class="btn btn-danger btn-block">
	                                   <i class="fa fa-user-plus"></i>
	                                    {{ __('Registrarse') }}
	                                </button>
	                            </div>
	                        </div>
	                    </form>
	</div>
	@stop