@extends("layouts.app")

@section("content")

<div class="espacio"></div>
<section class="actividades">
    <h1 class="titulo fs-1">Actividades</h1>
    <div class="borde"></div>
    <div class="m-5 px-5 gap-3" id="galeria">
        @forelse($activities as $activity)
            <div class="card bg-dark">
                <a href="{{ route('activities.edit', ['activity' => $activity]) }}" class="w-100 h-100">
                    <img class="w-100 h-100" src="images/{{$activity->image}}" alt="{{ $activity->name }}">
                    <h1 class="text-uppercase text-center text-light texto-imagen-centrado texto-actividades">{{ $activity->name }}</h1>
                </a>
            </div>
        @empty
            <p>No hay actividades disponibles.</p>
        @endforelse
    </div>        
</section>


<script>

</script>

@endsection