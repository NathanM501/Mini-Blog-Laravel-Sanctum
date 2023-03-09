@extends('layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('home') }}">Accueil</a> /</span>
        Nouvelle article
    </h4>

    <div class="row">
        <div class="col-md-8 offset-md-2">

            <div class="card mb-4">
                <h5 class="card-header">Nouvelle article</h5>

                <Create />
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>
@endsection