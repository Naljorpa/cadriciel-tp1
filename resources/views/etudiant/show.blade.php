@extends('layouts.app')
@section('title','Détail d\'étudiant')
@section('content')

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="{{asset('img/page-bg/4.jpg')}}">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">Accueil</a>
            <a href="{{ route('etudiant.index') }}">Liste d'étudiant</a>
            <span>Détails</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">Détails d'un étudiant</h1>
        </div>
    </div>
</div>
<!-- Page info end -->

<div class="container">
    <div class="row">
        <div class="col-12  pt-5">
            <div class="text-center pt-5">
                <div class="blue-maisonneuve pt-3 pb-5">
                    <h2 class="display-one mt-5 blue-maisonneuve-h1">{{ ucfirst($etudiant->nom) }}</h2>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Date de naissance</strong>:</p>
                        </div>
                       
                        <div class="col-md-6">
                            <p>{!! $etudiant->date_de_naissance !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Adresse</strong>:</p>
                        </div>
                        
                        <div class="col-md-6">
                            <p>{!! $etudiant->addresse !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Ville</strong>:</p>
                        </div>
                       
                        <div class="col-md-6">
                            <p>{!! $etudiant->etudiantHasVille->nom !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Téléphone</strong>:</p>
                        </div>
                        
                        <div class="col-md-6">
                            <p>{!! $etudiant->phone !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Courriel</strong>:</p>
                        </div>
                       
                        <div class="col-md-6">
                            <p>{!! $etudiant->email !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Matricule</strong>:</p>
                        </div>
                      
                        <div class="col-md-6">
                            <p>{{$etudiant->id}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <div class="row text-center mb-5 mt-3">
        <div class="col-6">
            <a href="{{ route('etudiant.edit', $etudiant->id)}}" class="site-btn ">Mettre a jour</a>
        </div>
        <div class="col-6">
            <button type="button" class="site-btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Effacer
            </button>

        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Détruire un étudiant</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
            </div>
            <div class="modal-body">
                Êtes-vous certain de vouloir vous débarrasser de cet étudiant?
            </div>
            <div class="modal-footer">
                <form action="{{ route('etudiant.edit', $etudiant->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="site-btn btn-danger" value="Effacer">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection