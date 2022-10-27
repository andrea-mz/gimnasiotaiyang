@extends("layouts.app")

@section("content")
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
        <div class="text-center">
            <h1 class="my-3">{{ __("Necesitas ser admin para poder ver la página.") }}</h1>
        </div>
    </div>
@endsection
