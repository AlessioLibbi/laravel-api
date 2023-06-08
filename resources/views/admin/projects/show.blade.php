@extends('layouts.admin')

@section('content')
<h1 class="text-center">{{ $project->title }}</h1>
    <div class="text-end">
        {{ $project->slug }}
       
    </div>
    @if ($project->type)
        <h3><span class="tiping my-4">Tipologia:</span> {{ $project->type?->name }}</h3>
    @else
        <h3><span class="tiping my-4">Nessuna Tipologia </span></h3>
    @endif
    <p class="mt-4">{{ $project->description }}</p>
    
@endsection