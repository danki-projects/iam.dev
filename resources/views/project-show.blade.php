@extends('layouts.main')

@section('title', $title)
@section('meta_description', $project->description)

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <small class="d-block text-right font-italic text-light-gray">Data do projeto: {{ $project->updated_at->format('d M Y') }}</small>
                <h1 class="text-purple font-weight-bolder">{{ $project->name }}</h1>
                <h2 class="h5 text-light-gray">{{ $project->description }}</h2>

                <p class="text-right mt-3 text-light-gray">
                    Empresa: <a class="text-purple font-weight-bold" target="_blank" href="{{ $project->company_url }}">
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
                <div class="col-12 text-light-gray">
                    {!! $project->content !!}
                </div>
                <div class="col-12">
                    <hr>
                    <small class=" mt-4 d-block text-right font-italic text-light-gray">Data do projeto: {{ $project->updated_at->format('d M Y') }}</small>
                </div>
            </div>
        </div>
    </div>
@endsection
