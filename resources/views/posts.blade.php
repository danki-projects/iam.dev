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
</div>
@endsection
