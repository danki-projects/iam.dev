@extends('layouts.main')

@section('title', $title)
@section('meta_description', $project->description)

@section('content')
    <div class="row">
        <div class="col-12">
            <small class="d-block text-right">Data do projeto: {{ $project->updated_at->format('d M Y') }}</small>
            <h1>{{ $project->name }}</h1>
            <h2 class="h4">{{ $project->description }}</h2>

            <p class="text-right mt-3">
                Empresa: <a class="text-info font-weight-bold" target="_blank" href="{{ $project->company_url }}">
                    {{ $project->company_name }}
                </a>
            </p>

            <div class="row my-5">
                @foreach($project->images as $image)
                    <div class="col-12 col-lg-2 col-md-4 col">
                        <img src="{{ $image->slug }}" alt="{{ $image->label }}" class="img-fluid img-thumbnail my-1">
                    </div>
                @endforeach
            </div>
            <div class="col-12">
                {!! $project->content !!}
            </div>
        </div>
    </div>
@endsection
