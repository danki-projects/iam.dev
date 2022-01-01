@extends('layouts.main')

@section('content')
    <div class="content">
        <h1 class="h4">Últimos projetos publicados</h1>
        <div class="row">
            @foreach($projects as $project)
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
                            <a href="{{ route('project.show', $project->slug) }}" class="btn btn-light">
                                {{ __('inputs.button_more_detail') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <hr>
                </div>
            @endforeach
            <div class="col-12">
                @if ($posts->count())
                    <h2 class="h4 mb-3">Postagens mais vistas</h2>
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-12 col-md-3">
                                <div class="card">
                                    <a href="{{ route('blog.post', [$post->category_slug, $post->slug]) }}" class="">
                                        <img class="card-img"
                                             src="{{ $post->images()->first()->slug }}"
                                             alt="{{ $post->images()->first()->label }}">
                                        <div class="card-body">
                                            <h3 class="mt-2 h5">{{ Str::limit($post->name, 20) }}</h3>
                                            <p class="small">{{ Str::limit($post->description, 70) }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection

