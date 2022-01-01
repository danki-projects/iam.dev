@extends('layouts.main')

@section('title', $title)
@section('meta_description', $description)
@section('content')
    <h1 class="h3">{{ __('app.projects') }}</h1>

    <div class="row">
        @forelse($projects as $project)
            <div class="col-12 my-3">
                <div class="row">
                    @foreach($project->images()->limit(3)->get() as $image)
                        <div class="col-12 col-md">
                            <img src="{{ $image->slug }}" alt="{{ $image->label }}"
                                 class="img-fluid img-thumbnail m-1">
                        </div>
                    @endforeach
                    <div class="col-12 col-md-5 col">
                        <h2 class="text-right text-info h3">Projeto - {{ $project->name }}</h2>
                        <p class="">{{ $project->description }}</p>
                        <h3 class="h5 my-0">Empresa: {{ $project->company_name }}</h3>
                        <small class="text-info d-block">Site: {{ $project->company_url }}</small>
                        <a href="{{ route('project.show', $project->slug) }}" class="btn btn-light my-3">
                            {{ __('inputs.button_more_detail') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <hr>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center my-5">Nenhum projeto publicado ainda...</p>
            </div>
        @endforelse
    </div>
    <div class="row">
        <div class="col-12">
            {{ $projects->links() }}
        </div>
    </div>
@endsection
