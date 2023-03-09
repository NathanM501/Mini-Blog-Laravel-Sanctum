@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<h4 class="mb-2">Mot de passe oublié ? 🔒</h4>
<p class="mb-4">Entrez votre email et nous vous enverrons des instructions pour réinitialiser votre mot de passe</p>

<form method="POST" action="{{ route('password.email') }}" class="mb-3">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">Adresse email</label>

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Entrez votre adresse email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary d-grid w-100">
        {{ __('Envoyer le lien de réinitialisation') }}
    </button>
</form>

<div class="text-center">
    <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
        <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
        Retour à la page de connexion
    </a>
</div>
@endsection