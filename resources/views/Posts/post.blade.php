@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('home') }}">Accueil</a>
            /</span>Détails de l'article
    </h4>


    <div class="row mb-5">


        <div class="col-md-6 col-lg-6 offset-lg-3 mb-3">
            <div class="card h-100">
                @if ($post->image != null)
                <img class="card-img-top" src="/storage/{{ $post->image }}" alt="Card image cap" />
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">
                        {{ $post->content }}
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <div>
                        Publier par <strong>{{ $post->user->name }}</strong>
                    </div>
                    <div>
                        <p class="card-text"><small class="text-muted">{{ $post->created_at }}</small></p>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>

@endsection