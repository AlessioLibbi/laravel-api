@extends('layouts.admin')

@section('content')
    <h2>Modifica il project {{ $project->title }}</h2>


    <form method="POST" action="{{ route('admin.projects.update', $project->slug) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title', $project->title) }}">
            @error('title')
                <h2 class="invalid-feedback">{{ $message }}</h2>
            @enderror

        </div>
        <div class="form-group w-25 mx-auto my-5 ">
            <label for="type">Inserisci la tipologia</label>
            <select class="form-select w-50 mx-auto" id="type" name="type_id">
                <option value=""></option>
                @foreach ($types as $type)
                    <option class="text-center" @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="btn-group" role="group">
            @foreach ($technologies as $technology)
                <input type="checkbox" class="btn-check" name="technologies[]" value="{{ $technology->id }}"
                    id="{{ $technology->name }}" autocomplete="off" @checked(old('technologies')
                            ? in_array($technology->id, old('technologies', []))
                            : $project->technologies->contains($technology))>
                <label class="btn btn-outline-primary" for="{{ $technology->name }}">{{ $technology->name }}</label>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $project->description) }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Invia</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-warning">Annulla</a>
    </form>
@endsection
