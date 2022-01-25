@extends('layouts.main')

@section('content')

    <div class="bg-purple" style="background-image: url({{ asset('images/bg-top.png') }});">
        <div class="container h-400size d-flex justify-content-center align-items-center">
            <div class="bg-white py-3 px-4 rounded margin-negative">
                <div class="row">
                    <div class="col-12 col-md-4 d-inline-flex justify-content-center justify-content-md-start">
                        <div class="pr-4 mr-4 border-right border-light-gray">
                            <span class="d-block text-light-gray small">Projetos</span>
                            <span class="font-weight-bold">0.0056</span>
                        </div>
                        <div class="pr-4 mr-2 border-right border-light-gray">
                            <span class="d-block text-light-gray small">Posts</span>
                            <span class="font-weight-bold">0.0412</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <form class="form-inline mt-4 mt-md-0 justify-content-center justify-content-md-start"
                              action="{{ route('search') }}">
                            <input class="form-control form-control-lg border-0 "
                                   type="search"
                                   name="params"
                                   placeholder="{{ __('inputs.placeholder.search') }}"
                                   aria-label="Search">
                            <button class="btn btn-lg btn-dark ml-0 ml-md-2" type="button">
                                {{ __('inputs.button_search') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container bg-white py-5 px-4 rounded-top-large margin-negative">
        <div class="content">
            <h1 class="h1 font-weight-bolder text-center mb-3 mt-4">
                Últimos <span class="text-purple">Projetos</span> publicados <span class="text-purple">!</span>
            </h1>
            <div class="w-75 ml-auto mr-auto">
                <p class="text-center text-light-gray">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam at atque beatae cupiditate error est excepturi facere laborum magnam minus nostrum perferendis quo rem sapiente sunt ut, vitae voluptatem.
                </p>
            </div>
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
                                <h2 class="text-right h5 font-weight-bolder text-dark">Projeto - {{ $project->name }}</h2>
                                <p class="">{{ $project->description }}</p>
                                <a href="{{ route('project.show', $project->slug) }}" class="btn btn-purple btn-sm text-white text-uppercase">
                                    <small>{{ __('inputs.button_more_detail') }}</small>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-black py-5" style="background-image: url({{ asset('images/bg-top.png') }});">
        <div class="container">
            <div class="content">
                <div class="row">
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
    </div>
@endsection

