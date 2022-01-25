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