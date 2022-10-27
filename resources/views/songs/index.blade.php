@extends("layouts.app")

@section("content")
    <div class="p-4 mt-5 flex justify-around">
        <h1 class="mb-5">{{ __("LISTADO DE CANCIONES") }}</h1>
        <a href="{{ route('songs.create') }}" class="bg-transparent hover:bg-yellow-500 text-yellow-500 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
            {{ __("Añadir canción") }}
        </a>
    </div>

    <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 75%; margin: auto; border-color: #e3a008;">
        <thead>
        <tr style="background: #e3a008; color: white;">
            <th class="px-4 py-2">{{ __("Id") }}</th>
            <th class="px-4 py-2">{{ __("Grupo") }}</th>
            <th class="px-4 py-2">{{ __("Nombre") }}</th>
            <th class="px-4 py-2">{{ __("Acciones") }}</th>
            <th class="px-4 py-2">{{ __("Usuario") }}</th>
        </tr>
        </thead>
        <tbody>
            @forelse($songs as $song)
                <tr>
                    <td class="border px-4 py-2" style="background: #f9c64f; color: white;">{{ $song->id }}</td>
                    <td class="border px-4 py-2">{{ $song->group->name }}</td>
                    <td class="border px-4 py-2">{{ $song->name }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('songs.edit', ['song' => $song]) }}" class="text-yellow-400">{{ __("Editar") }}</a> |
                        <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-song-{{ $song->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-song-{{ $song->id }}-form" action="{{ route('songs.destroy', ['song' => $song]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>
                    <td class="border px-4 py-2">{{ $song->user->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <p><strong class="font-bold">{{ __("No hay canciones") }}</strong></p>
                            <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
 
  @if($songs->count())
        <div class="mt-3" style="margin-top: 2em; margin-left: 15em;">
            {{ $songs->links() }}
           
        </div>
    @endif

@endsection
