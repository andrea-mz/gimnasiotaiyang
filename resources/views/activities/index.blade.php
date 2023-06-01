@extends("layouts.app")

@section("content")

<div class="espacio"></div>
<section class="actividades">
    <h1 class="titulo fs-1">Actividades</h1>
    @guest
    @else
    @if(Auth::user()->hasroles('admin'))
        <div class="d-flex justify-content-end me-5">
            <a class="btn btn-outline-warning me-5" href="{{ route('activities.create') }}">CREAR ACTIVIDAD</a>
        </div>
    @endif
    @endguest
    <div class="borde"></div>
    <div class="my-5 d-flex justify-content-center row">
        @forelse($activities as $activity)
            <div class="col-3 mx-4">
                <div class="card p-0 bg-dark w-100 h-75">
                    <img class="w-100 h-100" src="images/{{$activity->image}}" alt="{{ $activity->name }}">
                    <h1 class="text-uppercase text-center text-light texto-imagen-centrado texto-actividades">{{ $activity->name }}</h1>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    @guest
                    @else
                    @if(Auth::user()->hasroles('admin'))
                        <a href="{{ route('activities.edit', ['activity' => $activity]) }}" class="btn btn-outline-warning mx-2">EDITAR</a>
                    @endif
                    @endguest
                    <a href="{{ route('reservations.create', ['activity' => $activity]) }}" class="btn btn-outline-warning mx-2">RESERVAR</a>
                </div>
            </div>
        @empty
            <p>No hay actividades disponibles.</p>
        @endforelse
    </div>
</section>


<script>

</script>

@endsection
