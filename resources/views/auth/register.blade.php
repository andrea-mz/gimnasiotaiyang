@extends('layouts.app')

@section('content')
<h1 class="titulo mb-5 fs-1">Registro de Usuario</h1>
    <form method="POST" action="{{ route('register') }}" class="login formulario text-white fs-3 row mx-auto flex-column border border-5 border-white p-3">
        @csrf
        <label for="name" class="my-3 mx-5 ps-4">Nombre de usuario:</label>
        <input type="text" name="name" id="name" class="my-3 mx-auto w-75 form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label for="email" class="my-3 mx-5 ps-4">Correo electrónico:</label>
        <input type="email" name="email" id="email" class="my-3 mx-auto w-75 form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label for="password" class="my-3 mx-5 ps-4">Contraseña:</label>
        <input type="password" name="password" id="password" class="my-3 w-75 mx-auto form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label for="password-confirm" class="my-3 mx-5 ps-4">Confirmar contraseña:</label>
        <input id="password-confirm" type="password" class="my-3 w-75 mx-auto form-control" name="password_confirmation" required autocomplete="new-password">
        <button type="submit" class="my-3 w-50 mx-auto  btn btn-light bg-light fs-3">Registrarse</button>
    </form>
    <p class="text-white text-center fs-3 mt-5">¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-white text-decoration-underline">Inicia Sesión</a></p>
@endsection
