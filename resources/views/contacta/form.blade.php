@extends("layouts.app")

@section("content")
    <div class="espacio"></div>
    <h1 class="titulo mb-5 fs-1">Contacto</h1>
    <form class="contacto text-white fs-3 row mx-auto border border-5 border-white p-3" method="POST" action="{{ route('contacta.store') }}" style="border-color: #e3a008;">
    @csrf
        <div class="name">
            <label for="name" class="my-3 ps-4 text-center">{{ __("Nombre:") }}</label>
            <input type="text" name="name" value="" id="name" type="text" class="my-3 mx-auto ps-2 w-100 text-dark">
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="correo">
                <label for="email" class="my-3 ps-4">{{ __("Correo electrónico:") }}</label>
                <input type="email" name="email" value="" id="email" type="text" class="my-3 ps-2 w-100 mx-auto text-dark">
                @error("email")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
            </div>
            <div class="mensaje flex-column">
                <label for="mensaje" class="my-3 ps-4">{{ __("Mensaje:") }}</label>
                <textarea name="mensaje" id="mensaje" class="ps-2 w-100 text-dark" rows="10"></textarea>
                @error("mensaje")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
            </div>
            <div class="terminos text-center my-2">
                <input type="checkbox" name="terminos" id="terminos" required>
                <label for="terminos">Acepto los términos y las condiciones.</label>
            </div>
            <button class="my-3 w-50 mx-auto bg-light text-dark" type="submit">
                {{ 'Enviar' }}
            </button>
    </div>
</form>
</div>
@endsection
