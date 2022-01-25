@extends('layouts.main')

@section('title', $title)
@section('meta_description', $description)
@section('content')
    <div class="container py-5">
        <h1 class="h2  font-weight-bolder text-purple">{{ __('app.projects') }}</h1>
        <p class="mb-3 mb-md-5 text-light-gray">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid assumenda cum deserunt dolorem inventore,
            iure natus, necessitatibus nemo neque nobis numquam placeat porro quae quos saepe velit voluptate voluptatem
            voluptatibus.
        </p>
        <div class="row">
            @forelse($projects as $project)
                @include('partials.project-box', ['project' => $project])
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
    </div>
@endsection
