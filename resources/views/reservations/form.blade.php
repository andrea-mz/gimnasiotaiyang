<form class="w-100" method="POST" action="{{ $route }}" enctype="multipart/form-data">    
@csrf
    @isset($update)
        @method("PUT")
    @endisset
    <h1 class="my-5 titulo fs-1">{{ $title }}</h1>
    <div class="borde"></div>
    <div class="mt-5 mx-auto justify-content-center">
        <h1 class="text-uppercase text-center text-light fs-3 mb-5">ACTIVIDAD SELECCIONADA: <span id="actividad_seleccionada" class="text-warning"></span></h1>
        <div class="d-flex">
            @forelse($hours as $hour)
                <div class="card p-0 bg-dark">
                    <h1 class="text-uppercase text-center text-light">{{ $hour->day_of_the_week }}</h1>
                    <h1 class="text-uppercase text-center text-light">{{ $hour->hour }}</h1>
                </div>
            @empty
                <div class="card p-0 bg-dark">
                    <h1 class="text-uppercase text-center text-light">{{ ("No hay horas disponibles para esta actividad.") }}</h1>
                </div>
            @endforelse
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3">
                <button class="shadow bg-yellow-400 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    {{ $textButton }}
                </button>
            </div>
        </div>
    </div>
</form>

<script>

    document.querySelector("#actividad_seleccionada").innerHTML=<?php echo $activity ?>[0].name;

</script>
