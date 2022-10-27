@extends('adminlte::page')

@section('title','Panel Admin')

@section('content_header')
    <h1>Listado de Usuarios</h1>
@stop

@section('content')

    <div class="flex justify-center flex-wrap p-4 mt-5">

        @include("users.edit")
        
    </div>

@endsection
