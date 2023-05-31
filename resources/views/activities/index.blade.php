@extends("layouts.app")

@section("content")

<div class="espacio"></div>
<section class="actividades">
    <h1 class="titulo fs-1">Actividades</h1>
    <div class="borde"></div>
    <div class="m-5 px-5 gap-3" id="galeria">
        @forelse($activities as $act)
            <div class="card bg-dark">
                <a href="{{ route('activities.edit', ['activity' => $act]) }}" class="w-100 h-100">
                    <img class="w-100 h-100" src="images/{{$act->image}}" alt="{{ $act->name }}">
                    <h1 class="text-uppercase text-center text-light texto-imagen-centrado texto-actividades">{{ $act->name }}</h1>
                </a>
            </div>
        @empty
            <p>No hay actividades disponibles.</p>
        @endforelse
    </div>        
</section>


<script>

    document.addEventListener("DOMContentLoaded", () => {

        

    });

</script>

@endsection