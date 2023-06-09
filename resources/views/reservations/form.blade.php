<style>

.input_hora:checked + .label_hora {

    background-color: orange !important;

}

.input_hora:checked + .label_hora h1 {

    color: black !important;

}

.input_hora:disabled + .label_hora {

    background-color: #2b2b2b !important;

}

</style>

<form class="w-100" method="POST" action="{{ $route }}">
@csrf
    @isset($update)
        @method("PUT")
    @endisset
    <h1 class="my-5 titulo fs-1">{{ $title }}</h1>
    <div class="borde"></div>
    <div class="mt-5 mx-auto justify-content-center">
        <h1 class="text-uppercase text-center text-light fs-3 mb-5">ACTIVIDAD: <span id="actividad_seleccionada" class="text-warning"></span></h1>
        <div class="row w-50 mx-auto">
            @forelse($hours as $hour)
                <input type="checkbox" id="hora_{{ $hour->id }}" value="{{ $hour->id }}" class="input_hora hidden" name="hour_id[]">
                    <label for="hora_{{ $hour->id }}" class="card p-0 bg-dark col label_hora">
                        <h1 class="text-uppercase text-center text-light fs-4 py-2">{{ $hour->day_of_the_week }}</h1>
                        <h1 class="text-uppercase text-center text-light fs-5 py-2">{{ $hour->hour }}</h1>
                        <h1 class="text-uppercase text-center text-light fs-5 py-2 plazas" id="{{ $hour->id }}"><span class="reservadas" id="{{ $hour->reserved_places }}">{{ $hour->reserved_places }} </span> / <span class="totales" id="{{ $hour->available_places }}">{{ $hour->available_places }}</span></h1>
                    </label>
            @empty
                <div class="card p-0 bg-dark">
                    <h1 class="text-uppercase text-center text-light">{{ ("No hay horas disponibles para esta actividad.") }}</h1>
                </div>
            @endforelse
            <div class="mt-5 d-flex justify-content-end">
                <button class="shadow bg-yellow-400 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded " type="submit">
                    {{ $textButton }}
                </button>
            </div>
        </div>
    </div>
</form>

<script>

    $('#actividad_seleccionada').html(<?php echo $activity ?>[0].name);

    for(i=0;i<$('.plazas').length;i++) {

        if($('.plazas .reservadas')[i].id==$('.plazas .totales')[i].id) {

            for(j=0;j<$('.input_hora').length;j++) {

                if($('.input_hora')[j].value==$('.label_hora .plazas')[i].id) {

                    document.getElementsByClassName('input_hora')[j].disabled = true;

                }

            }

        }

    }

</script>
