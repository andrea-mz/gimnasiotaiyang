@extends("layouts.app")

@section("content")

<form class="w-100" method="PUT" action="{{ $route }}" enctype="multipart/form-data">
@csrf
    <h1 class="my-5 titulo fs-1">{{ $title }}</h1>
    <div class="borde"></div>
    <div class="mt-5 mx-auto row justify-content-center w-25">
        <label class="block uppercase tracking-wide text-light text-xs font-bold -my-1 mb-3" for="activity">
            {{ __("Actividad") }}
        </label>
        <select name="activity" id="activity">
            @forelse($old_activity as $old)
                <option value="{{ $old->id }}">{{ $old->name }}</option>
            @empty
            @endforelse
            @forelse($activities as $act)
                <option value="{{ $act->id }}">{{ $act->name }}</option>
            @empty
                <option class="text-uppercase text-center text-light">{{ ("No hay actividades disponibles.") }}</option>
            @endforelse
        </select>
        @error("activity")
        <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
            {{ $message }}
        </div>
        @enderror
        <label class="block uppercase tracking-wide text-light text-xs font-bold -my-1 mb-3" for="hour">
            {{ __("Hora") }}
        </label>
        <select name="hour" id="hour">
            @forelse($old_activity as $old)
                <option value="{{ $old->id }}">{{ $old->name }}</option>
            @empty
            @endforelse
            @forelse($activities as $act)
                <option value="{{ $act->id }}">{{ $act->name }}</option>
            @empty
                <option class="text-uppercase text-center text-light">{{ ("No hay actividades disponibles.") }}</option>
            @endforelse
        </select>
        @error("activity")
        <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
            {{ $message }}
        </div>
        @enderror
        <div class="md:flex md:items-center">
            <div class="md:w-1/3">
                <button class="shadow bg-yellow-400 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    {{ $textButton }}
                </button>
            </div>
        </div>
    </div>
</form>

@endsection

