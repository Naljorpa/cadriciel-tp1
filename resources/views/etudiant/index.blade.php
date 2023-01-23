@extends('layouts.app')
@section('title','Liste d\'étudiants')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <h1 class="display-one">{{ config('app.name') }}</h1>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <p>Liste des étudiants</p>
                </div>
                <div class="col-md-4">
                    <a href="{{route('etudiant.create')}}" class="btn btn-outline-primary">
                        Ajouter un etudiant

                    </a>
                </div>
            </div>
            <hr>
        </div>

        <div class="row mb-5 col-12">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Liste des étudiants
                    </div>
                    <div class="card-body">
                        <ul>
                            @forelse($etudiants as $etudiant)
                            <li><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ ucfirst($etudiant->nom) }}</a></li>
                            @empty <p class="text-warning">
                                Étudiant non trouvé </p>
                            @endforelse
                        </ul>
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>
@endsection