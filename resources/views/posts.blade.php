@extends('layouts.main')

@section('meta_description', $post->description)
@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{ $post->name }}</h1>
            <h2>{{ $post->description }}</h2>
            <div class="row my-3">
                @foreach($post->images as $image)
                    <div class="col">
                        <img src="{{ $image->slug }}" alt="{{ $image->label }}" class="img-fluid rounded">
                    </div>
                @endforeach
            </div>
            <p>{!! $post->content !!}</p>
            <small class="text-right d-block mt-5">{{ $post->created_at->format('d/m/Y H:i') }}</small>
        </div>
        <div class="col-12">
            <hr>
            <h5>Comentários</h5>
            @include('partials.comments')
            <div class="d-block py-4 pr-4 pr-md-3 pr-md-5 pl-3 rounded mb-4" id="comments">
                <div class="row">
                    @forelse($post->comments()->orderByDesc('id')->get() as $comment)
                        <div class="col-12">
                            <div class="row align-items-center mb-3 ">
                                <div class="col-4 col-md-2 text-center">
                                    <img src="{{ $comment->user->cover }}" class="rounded-circle"
                                         alt="{{ $comment->user->full_name }}"
                                         title="{{ $comment->user->full_name }}" width="75">
                                </div>
                                <div class="col-8 col-md-10 bg-dark p-3 rounded shadow">
                                    <p class="m-0 text-muted mb-2">
                                       <span class="row">
                                           <span class="col">
                                               <small><i class="fas fa-user-circle"></i> {{ $comment->user->full_name }}</small>
                                           </span>
                                           <span class="col text-right">
                                               <small><i
                                                           class="fas fa-clock"></i> {{ $comment->updated_at->diffForHumans() }}</small>
                                           </span>
                                       </span>
                                    </p>
                                    <div class="d-block small">
                                        {!! $comment->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Este post ainda não possui nenhum comentário</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
