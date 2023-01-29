@extends('layouts.app')
@section('title', 'Accueil')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <div class="blue-maisonneuve pt-3 pb-5">
                <h1 class="display-one mt-5 blue-maisonneuve-h1">Bienvenue sur la page d'accueil de la gestion des étudiants du collège Maisonneuve</h1>
            </div>
            <div class="mt-5">
                <a href="{{ route('etudiant.index') }}" class="btn btn-outline-maisonneuve">
                    Afficher la liste des étudiants</a>
            </div>
        </div>
    </div>
</div>
@endsection