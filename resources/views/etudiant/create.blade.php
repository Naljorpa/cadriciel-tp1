@extends('layouts.app')
@section('title','Ajouter')
@section('content')

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="{{asset('img/page-bg/2.jpg')}}">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="/">Accueil</a>
            <a href="{{ route('etudiant.index') }}">Liste d'étudiant</a>
            <span>Ajouter un étudiant</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">Ajouter un étudiant</h1>
        </div>
    </div>
</div>
<!-- Page info end -->

<div class="row ">
    <div class="col-lg-7 mx-auto mb-5">
        <div class="card mt-5 mx-auto p-4 bg-light">
            <div class="card-body bg-light">
                <div class="container">
                    <form method="post">
                        @csrf
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nom">Nom *</label>
                                        <input type="text" name="nom" class="form-control" placeholder="Svp entrez votre nom" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Courriel *</label>
                                        <input type="email" name="email" class="form-control" placeholder="Svp entrez votre courriel" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="addresse">Adresse *</label>
                                        <input type="text" name="addresse" class="form-control" placeholder="Entrez votre adresse *" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for='ville_id'>Choisissez votre ville: </label>
                                        <select name="ville_id" class="form-control" required="required">
                                            <option value=''>--Choisissez--</option>
                                            @foreach($villes as $ville)
                                            <option value="{{$ville->id}}">{{$ville->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Téléphone</label>
                                        <input type="text" name="phone" id="body" class="form-control" placeholder="(xxx) xxx-xxxx*" required="required"></input>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_de_naissance">Date de naissance</label>
                                        <input type="date" name="date_de_naissance" id="body" class="form-control" required="required"></input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="sauvegarder" class="site-btn btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection