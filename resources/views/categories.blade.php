@extends('layouts.main')

@section('content')
    <h1>{{ $category }}</h1>
    <p>
        <a href="{{ route('blog.post', [$category, 'how-to-use-controllers']) }}">Acessar o post</a>
    </p>
@endsection
