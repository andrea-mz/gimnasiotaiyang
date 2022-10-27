<form class="w-full max-w-lg border-4" method="POST" action="{{ $route }}" style="border-color: #e3a008;">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
     <h1 class="font-semibold py-5 text-blue mb-10 bg-yellow-400 text-white px-5">{{ $title }} </h1>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="name">
                {{ __("Grupo") }}
            </label>
            <select name="group_id"> 
                @forelse($group as $grupo)
                    <option value="{{ old('id') ?? $grupo->id }}">{{ $grupo->name }}</option>
                @empty
                    <option value="none">{{ ("No hay grupos disponibles.") }}</option>
                @endforelse
            </select>
            </br></br></br>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="name">
                {{ __("Nombre") }}
            </label>
            <input name="name" value="{{ old('name') ?? $song->name }}" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text">
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Nombre de la canción") }}</p>
            </br></br>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ "El campo NOMBRE es obligatorio." }}
            </div>
            @enderror
        </div>
    </div>
    <div class="md:flex md:items-center">
        <div class="md:w-1/3">
            <button class="shadow bg-yellow-400 hover:bg-yellow-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                {{ $textButton }}
            </button>
        </div>
    </div>
</form>
