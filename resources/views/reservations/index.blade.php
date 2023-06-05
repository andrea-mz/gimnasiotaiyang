@extends("layouts.app")

@section("content")

<style>

    #tabla_reservas_wrapper {

        width: 50%;
        margin: auto;
        color: white;

    }

    #tabla_reservas_length label select option {

        color: black;

    }

</style>

<div class="espacio"></div>
<h1 class="titulo fs-1">Reservas</h1>
<div class="borde"></div>
<table id="tabla_reservas" class="table table-dark table-hover table-bordered text-uppercase text-light mx-auto" cellspacing="0">
    <thead>
        <tr>
            <th class="th-sm">RESERVA Nº</th>
            <th class="th-sm">USUARIO</th>
            <th class="th-sm">ACTIVIDAD</th>
            <th class="th-sm">DÍA</th>
            <th class="th-sm">HORA</th>
            @if(Auth::user()->hasroles('admin'))
                <th class="th-sm">PLAZAS</th>
                <th class="th-sm">ACCIONES</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse($reservations as $reservation)
            <tr>
                <td class="text-light">{{ $reservation->id }}</td>
                <td class="text-light">{{ $reservation->user->name }}</td>
                <td class="text-light">{{ $reservation->hour->act_id }}</td>
                <td class="text-light">{{ $reservation->hour_id }}</td>
                <td class="text-light">{{ $reservation->hour_id }}</td>
                @if(Auth::user()->hasroles('admin'))
                    <td class="text-light">{{ $reservation->hour_id }}</td>
                    <td><a href="{{ route('reservations.edit', ['reservation' => $reservation]) }}" class="btn btn-outline-warning mx-2">EDITAR</a>
                        <a href="{{ route('reservations.destroy', ['reservation' => $reservation]) }}" class="btn btn-outline-warning mx-2">ELIMINAR</a></td>
                @endif
            </tr>
            @empty
                <p>Todavía no se ha realizado ninguna reserva.</p>
            @endforelse
    </tbody>
</table>


<script>

    $(document).ready(function () {

        $('#tabla_reservas').DataTable({

            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
            },

        });

        $('.dataTables_length').addClass('bs-select');

    });

</script>

@endsection
