@extends('layouts.app')
@section('title','Détail d\'étudiant')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <a href="/etudiant" class="btn btn-outline-primary btn-sm">Retourner</a>
            <h1 class="display-one">{{ config('app.name') }}</h1>
            <hr>
            <div class="row">
            </div>
            <h4 class="display-one">
                {{ ucfirst($etudiant->nom) }}
            </h4>
            <hr>
        </div>

        <div class="row mb-5 col-12">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p><strong>Date de naissance</strong>: {!! $etudiant->date_de_naissance !!}</p>
                        <p><strong>Adresse</strong>: {!! $etudiant->addresse !!}</p>
                        <p><strong>Ville</strong>: {!! $etudiant->etudiantHasVille->nom !!}</p>
                        <p><strong>Téléphone</strong>: {!! $etudiant->phone !!}</p>
                        <p><strong>Courriel</strong>: {!! $etudiant->email !!}</p>
                    </div>
                    <div class="card-footer">
                        <p><strong>Matricule</strong>: {{$etudiant->id}}</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="row text-center mb-2">
        <div class="col-6">
            <a href="{{ route('etudiant.edit', $etudiant->id)}}" class="btn btn-success">Mettre a jour</a>
        </div>
        <div class="col-6">
            <form action="{{ route('etudiant.edit', $etudiant->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="Effacer">
            </form>
        </div>

    </div>
</div>
@endsection