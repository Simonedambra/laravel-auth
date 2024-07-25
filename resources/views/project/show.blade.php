@extends('layouts.app')

@section('content')
    <div class="container">

        {{ dd($project) }}

        <div class="header-page  pb-2 mb-4">
            <div class=" d-flex justify-content-between align-items-center">
                {{-- <h1>{{ $containsProject->name . ' ' . $containsProject->surname }}</h1> --}}
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.Project.index') }}" class="btn btn-primary" as="button">Torna alla lista</a>
                    {{-- <a href="{{ route('admin.Project.edit', $Project->{id}) }}" class="btn btn-primary"
                        as="button">Modifica</a> --}}
                </div>
            </div>
        </div>

        <p>
            {{-- {{ $containsProject->skills }} --}}
        </p>

        <hr>
        {{-- Category: {{ $post->category?->title ?: 'Categoria non definita' }} --}}

        <hr>
        {{-- @if ($containsProject->img) --}}
        <div>
            {{-- <img src="{{ asset('storage/' . $post->cover_image) }}"> --}}
        </div>
        {{-- @endif --}}






    </div>
@endsection
