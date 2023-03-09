@extends('layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Paramètres du
            compte /</span>
        Compte
    </h4>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <Profile :user="{{ $user }}" />
        </div>
    </div>
</div>
@endsection