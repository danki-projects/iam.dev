@extends('layouts.main')

@section('content')
    <h1 class="h5">{{ $researches->count() }} Resultados da pesquisa <strong>{{ $searched }}</strong></h1>
    <div class="row mt-3">
        @forelse ($researches as $research)
            <div class="col-12 my-1">
                <div class="card p-3 text-dark">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-light py-2">
                            <li class="breadcrumb-item">
                                <a href="#">http://teste.com.br</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Blog</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Postagem</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $research['created_at'] }}</li>
                        </ol>
                    </nav>

                    <h2 class="h5 text-info">{{ $research['name'] }}</h2>
                    <small class="">{{ $research['description'] }}</small>
                </div>
            </div>
        @empty
            <div class="col-12 my-5 mt-5">
                <h5 class="text-center text-info">Nenhum resultado encontrado</h5>
            </div>
        @endforelse

{{--        <div class="col-12 text-center">--}}
{{--            <div>{{ $researches->links() }}</div>--}}
{{--        </div>--}}
    </div>
@endsection
