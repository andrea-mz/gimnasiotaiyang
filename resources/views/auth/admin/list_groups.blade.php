@extends('adminlte::page')

@section('title','Panel Admin')

@section('content_header')
    <h1>Listado de Actividades</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
                <thead>
                    <tr>
                        <th class="px-4 py-2">{{ __("Id") }}</th>
                        <th class="px-4 py-2">{{ __("Nombre") }}</th>
                        <th class="px-4 py-2">{{ __("Creado el") }}</th>
                        <th class="px-4 py-2">{{ __("Actualizado el") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($groups as $group)
                        <tr>
                            <td class="border px-4 py-2">{{ $group->id }}</td>
                            <td class="border px-4 py-2">{{ $group->name }}</td>
                            <td class="border px-4 py-2">{{ date_format($group->created_at, "d/m/Y") }}</td>
                            <td class="border px-4 py-2">{{ date_format($group->updated_at, "d/m/Y") }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <p><strong class="font-bold">{{ __("No hay grupos") }}</strong></p>
                                    <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
