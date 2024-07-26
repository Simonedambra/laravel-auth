@extends('layouts.app')

@section('content')
    <div class="container mb-4">

        <div class="header-page  pb-2 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Crea un nuovo post</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.Project.index') }}" class="btn btn-primary" as="button">Torna alla lista</a>
                </div>
            </div>

        </div>
        @include('shared.errors')
        <form action="{{ route('admin.Project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="post-title" class="form-label">Titolo del post</label>
                <input type="text" class="form-control" id="post-title" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="post-content" class="form-label">Contenuto del post</label>
                <textarea class="form-control" id="post-content" rows="5" name="content">{{ old('content') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="post-content" class="form-label">Categoria del post - {{ old('project_id') }}</label>
                <select class="form-select" aria-label="Default select example" name="project_id">
                    <option value="">Seleziona Categoria</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" @if (old('project_id') == $project->id) selected @endif>
                            {{ $project->name }}</option>
                    @endforeach

                </select>
            </div>



            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input class="form-control" type="file" id="img" name="img" value="{{ old('img') }}">

            </div>
            <button class="btn btn-primary">Crea nuovo post</button>
        </form>



    </div>
@endsection
