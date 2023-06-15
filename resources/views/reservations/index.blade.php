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
                <td class="text-light nombre_act" id="{{ $reservation->hour->act_id }}">{{ $reservation->hour->act_id }}</td>
                <td class="text-light">{{ $reservation->hour->day_of_the_week }}</td>
                <td class="text-light">{{ $reservation->hour->hour }}</td>
                @if(Auth::user()->hasroles('admin'))
                    <td class="text-light">{{ $reservation->hour->reserved_places }}/{{ $reservation->hour->available_places }}</td>
                    <td class="d-flex datatable_acciones"><a href="{{ route('reservations.edit', ['reservation' => $reservation]) }}" class="btn btn-outline-warning mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg></a>
                    <form action="{{ route('reservations.destroy', $reservation->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-warning mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                        </svg></button>
                    </form></td>
                @endif
            </tr>
            @empty
                <p>Todavía no se ha realizado ninguna reserva.</p>
            @endforelse
    </tbody>
</table>

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

        $('#tabla_reservas').DataTable({

            language: {
				processing:     "Cargando ...",
                lengthMenu:     "Mostrar _MENU_ reservas por página",
                search:         "Buscar: ",
				info:           "Mostrando de la reserva _START_ a la _END_ de _TOTAL_ reservas",
				infoEmpty:      "Mostrando de la reserva 0 a la 0 de 0 reservas",
				infoFiltered:   "(filtrado de _MAX_ reservas totales)",
				infoPostFix:    "",
				loadingRecords: "Cargando ...",
				zeroRecords:    "No se encontraron reservas",
				emptyTable:     "No se encontraron reservas",
				paginate: {
					first:      "Primera",
					previous:   "Anterior",
					next:       "Siguiente",
					last:       "Ultima"
				},
			},
            responsive: true,
            scrollX: true
        });

        $('.dataTables_length').addClass('bs-select');

    });

</script>

@endsection
