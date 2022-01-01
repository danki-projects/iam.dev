@extends('layouts.main')

@section('meta_description', $category->description)
@section('title', $title)

@section('content')
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>
    <div class="row">
        @forelse ($posts as $post)
            <div class="col-12 col-sm-2 col-md-3 col-lg-4 py-3">
               <div class="card text-dark ">
                   <div class="card-header">
                       <h2>{{ Str::limit($post->name, 15, '...') }}</h2>
                   </div>
                  <div class="card-body card-height">
                      <p>{{ $post->description }}</p>
                  </div>
                   <div class="card-footer bg-dark">
                       <a class="text-info" href="{{ route('blog.post', [$category->slug, $post->slug]) }}">
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
@endsection
