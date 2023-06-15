@extends('adminlte::page')

@section('title','Panel Admin')

@section('content_header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <h1>Listado de Horas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table-responsive border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
                <thead>
                    <tr>
                        <th class="px-4 py-2">{{ __("Id") }}</th>
                        <th class="px-4 py-2">{{ __("Actividad") }}</th>
                        <th class="px-4 py-2">{{ __("Día") }}</th>
                        <th class="px-4 py-2">{{ __("Hora") }}</th>
                        <th class="px-4 py-2">{{ __("Plazas reservadas") }}</th>
                        <th class="px-4 py-2">{{ __("Plazas totales") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($hours as $hour)
                        <tr>
                            <td class="border px-4 py-2">{{ $hour->id }}</td>
                            <td class="border px-4 py-2 nombre_act" id="{{ $hour->act_id }}">{{ $hour->act_id }}</td>
                            <td class="border px-4 py-2">{{ $hour->day_of_the_week }}</td>
                            <td class="border px-4 py-2">{{ $hour->hour }}</td>
                            <td class="border px-4 py-2">{{ $hour->reserved_places }}</td>
                            <td class="border px-4 py-2">{{ $hour->available_places }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <p><strong class="font-bold">{{ __("No hay horas") }}</strong></p>
                                    <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>

        $(document).ready(function () {

            activities=(<?php echo $activities ?>);

            for(i=0;i<$('.nombre_act').length;i++) {

                cont=0;

                while($('.nombre_act')[i].id!=activities[cont].id) {

                    cont++;

                }

                $('.nombre_act')[i].innerHTML=activities[cont].shortname;

            }

        });

    </script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
