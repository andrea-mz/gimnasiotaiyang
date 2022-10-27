@extends('adminlte::page')

@section('title','Panel Admin')

@section('content_header')
    <h1>Crear proyecto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
                <form class="w-full max-w-lg border-4" method="POST" action="">
                    @csrf
                    @isset($update)
                        @method("PUT")
                    @endisset
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="name">
                                {{ __("NOMBRE") }}
                            </label>
                            <input name="name" value="{{ old('name') ?? $project->name }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text">
                            @error("name")
                            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-5">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold my-5" for="description">
                                {{ __("DESCRIPCIÓN") }}
                            </label>
                            <textarea name="description" class="no-resize appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="description">{{ old("description") ?? $project->description }}</textarea>
                            @error("description")
                            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3">
                            <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                {{ 'Crear' }}
                            </button>
                        </div>
                    </div>
                </form>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


