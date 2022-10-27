@extends('adminlte::page')

@section('title','Panel Admin')

@section('content_header')
    <h1>Panel de Administrador</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Bienvenido, administrador</h1>
        </div>
        <div class="card-body">
            <p>Esta es la página que sólo puede ver el administrador</p>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop