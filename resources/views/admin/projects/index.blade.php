@extends('layouts.admin')

@section('content')
<h1>Titoli dei progetti</h1>
@if (session('message'))
<h3 id="errore-dinamico" class="alert alert-success">
    {{session('message')}}
</h3>
    @endif

<table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Tipi</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <th scope="row">{{$project->type?->name}}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td class="d-flex gap-3">
                        <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning">
                            <i class="fa-solid fa-gear"></i>
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    
@endsection