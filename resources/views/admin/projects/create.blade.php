@extends('layouts.admin')

@section('content')
    <h2>Crea il project</h2>


    <form method="POST" action="{{ route('admin.projects.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <h2 class="invalid-feedback">{{$message}}</h2>
            @enderror

        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Invia</button>
        <a href="{{route('admin.projects.index')}}" class="btn btn-warning" >Annulla</a>
    </form>
@endsection