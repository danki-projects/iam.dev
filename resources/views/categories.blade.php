@extends('layouts.main')

@section('meta_description', $category->description)
@section('title', $title)

@section('content')
    <div class="container py-5">
        <h1 class="text-purple font-weight-bolder text-capitalize">{{ $category->name }}</h1>
        <p class="text-light-gray">{{ $category->description }}</p>
        <div class="row">
            @forelse ($posts as $post)
                <div class="col-12 col-sm-2 col-md-3 col-lg-4 py-3">
                    <div class="card text-dark rounded-0 border-0">
                        <div class="card-header border-0">
                            <h2 class="h6 text-capitalize">{{ Str::limit($post->name, 15, '...') }}</h2>
                        </div>
                        <div class="card-body card-height">
                            <p>{{ $post->description }}</p>
                        </div>
                        <div class="card-footer bg-purple rounded-0">
                            <a class="text-white" href="{{ route('blog.post', [$category->slug, $post->slug]) }}">
                                Acessar o post
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <h2>Nenhum post encontrado nesta categoria.</h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection
