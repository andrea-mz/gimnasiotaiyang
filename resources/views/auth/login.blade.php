@extends('layouts.app')

@section('content')
    <div class="espacio"></div>
    <h1 class="titulo mb-5 fs-1">Inicio de Sesión</h1>
    <form action="POST" action="{{ route('login') }}" class="login text-white fs-3 row mx-auto flex-column border border-5 border-white p-3">
        @csrf
        <label for="email" class="my-3 mx-5 ps-4">Correo electrónico:</label>
        <input type="email" name="email" id="email" class="my-3 mx-auto w-75 form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label for="password" class="my-3 mx-5 ps-4">Contraseña:</label>
        <input type="password" name="password" id="password" class="my-3 w-75 mx-auto form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-check my-2">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Recordar usuario') }}
            </label>
        </div>
        <button type="submit" class="my-3 w-50 mx-auto btn btn-light bg-light fs-3">Iniciar Sesión</button>
    </form>
    <p class="text-white text-center fs-3 mt-5">¿Aún no tienes cuenta? <a href="{{ route('register') }}" class="text-white text-decoration-underline">Regístrate</a></p>
@endsection
