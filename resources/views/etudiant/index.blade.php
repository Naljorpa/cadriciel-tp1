@extends('layouts.app')
@section('title','Liste d\'étudiants')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
                <a href="/" class="btn btn-outline-maisonneuve btn-sm mb-5">Retourner</a>
            <div class="blue-maisonneuve pt-3 pb-5">
                <h1 class="display-one mt-5 blue-maisonneuve-h1">Liste des étudiants</h1>
            </div>
            <div class="mt-5 mb-5">
                <a href="{{route('etudiant.create')}}" class="btn btn-outline-maisonneuve">
                    Ajouter un etudiant
                </a>
            </div>
            {{$etudiants}}
        </div>
        <div class="list-group">
            @forelse($etudiants as $etudiant)
            <a class="list-group-item list-group-item-action" href="{{ route('etudiant.show', $etudiant->id) }}">{{ ucfirst($etudiant->nom) }}</a>
            @empty <p class="text-warning">
                Étudiant non trouvé </p>
            @endforelse
           
        </div>

    </div>
</div>

@endsection