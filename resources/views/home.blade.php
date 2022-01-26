@extends('layouts.main')

@section('content')

    <div class="bg-purple" style="background-image: url({{ asset('images/bg-top.png') }});">
        <div class="container h-400size d-flex justify-content-center align-items-center">
            <div class="bg-white py-3 px-4 rounded margin-negative">
                <div class="row">
                    <div class="col-12 col-md-4 d-inline-flex justify-content-center justify-content-md-start">
                        <div class="pr-4 mr-4 border-right border-light-gray">
                            <span class="d-block text-light-gray small">Projetos</span>
                            <span class="font-weight-bold">{{ str_pad($projectCount, 5, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="pr-4 mr-2 border-right border-light-gray">
                            <span class="d-block text-light-gray small">Posts</span>
                            <span class="font-weight-bold">{{ str_pad($postCount, 5, '0', STR_PAD_LEFT) }}</span>
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
                            <button class="btn btn-lg btn-dark ml-0 ml-md-2" type="submit">
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
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aperiam at atque beatae cupiditate
                    error est excepturi facere laborum magnam minus nostrum perferendis quo rem sapiente sunt ut, vitae
                    voluptatem.
                </p>
            </div>
            <div class="row">
                @foreach($projects as $project)
                    <div class="col-12 my-3">
                        <div class="row">
                            @include('partials.project-box', ['project' => $project])
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-black py-5"
         style="
                 background-image: url({{ asset('images/bg-top.png') }});
                 background-repeat: no-repeat;
                 "
    >
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-12">
                        @if ($posts->count())
                            <h2 class="h2 mb-3 text-light-gray font-weight-bolder">Postagens mais vistas</h2>
                            <p class="mb-3 mb-md-5 text-white">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto autem dolorem esse
                                expedita harum, molestiae quia repudiandae. Blanditiis deleniti dicta distinctio facere
                                fuga incidunt ipsa labore numquam odit voluptatem? Nulla.
                            </p>
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

