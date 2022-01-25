@extends('layouts.main')

@section('content')

    <div class="bg-purple">
        <div class="container h-400size">

            <div class="row">
                <div class="col-12 col-md-6">
                    <form class=" bg-white py-3 px-3 rounded" action="{{ route('search') }}">
                        <div class="row">
                            <div class="col-8">
                                <input class="w-100 form-control form-control-lg border-0 btn-outline-light" type="search"
                                       name="params"
                                       placeholder="{{ __('inputs.placeholder.search') }}"
                                       aria-label="Search">
                            </div>
                            <div class="col-4 text-right">
                                <button class="btn btn-lg btn-dark" type="submit">
                                    {{ __('inputs.button_search') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
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
                                        <a href="{{ route('blog.post', [$post->category_slug, $post->slug]) }}"
                                           class="">
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
    </div>
@endsection

