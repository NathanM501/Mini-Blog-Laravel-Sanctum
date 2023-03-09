@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Accueil /</span> Blogs</h4>
    <List :user="{{ Auth::user()->id }}" />
</div>
@endsection