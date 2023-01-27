@extends('layouts.app')
@section('title', 'Accueil')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <h1 class="display-one mt-5">{{ config('app.name') }}</h1>
            <p>
                Bienvenue sur la page d'accueil de la gestion des étudiants du collège Maisonneuve
            </p> <br> <a href="{{ route('etudiant.index') }}" class="btn btn-outline-primary">
                Afficher la liste des étudiants</a>
        </div>
    </div>
</div>
@endsection