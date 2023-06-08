@extends('layouts.admin')

@section('content')
    <div class="container text-center">
        <h1 class="my-3">Inserisci il tuo project : </h1>


        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="form-group w-75 mx-auto my-5 ">
                <label for="title">Inserisci titolo</label>
                <input type="text" name="title"
                    class="form-control mx-auto my-3 w-50 @error('title') is-invalid @enderror" id="title"
                    placeholder="Inserisci titolo" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group w-25 mx-auto my-5 ">
                <label for="type">Inserisci la tipologia</label>
                <select class="form-select w-50 mx-auto" id="type" name="type_id">
                    <option value=""></option>
                    @foreach ($types as $type)
                        <option class="text-center" @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group my-5 mx-auto w-50">
                <label for="description">Inserisci descrizione</label>
                <textarea name="description" id="description"class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-success" href="{{ route('admin.projects.index') }}">Ritorna nella lista</a>

        </form>

    </div>
@endsection