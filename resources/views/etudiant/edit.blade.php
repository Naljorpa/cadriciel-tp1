@extends('layouts.app')
@section('title','Modifier')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-2">
            <h1 class="display-one">Modifier un étudiant</h1>
        </div>
    </div>
</div>
<hr>
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <form method="post">
                @csrf
                <div class="card-header">
                    Formulaire
                </div>
                <div class="card-body">
                    <div class="control-group col-12">
                        <label for="nom">Nom</label>
                        <input type="text" id="title" name="nom" class="form-control"  value="{{$etudiant->nom}}">
                    </div>
                    <div class="control-group col-12">
                        <label for="addresse">Addresse</label>
                        <textarea name="addresse" id="body" class="form-control">{{$etudiant->addresse}}</textarea>
                    </div>
                    <div class="control-group col-12">
                        <label for="phone">Téléphone</label>
                        <input type="text" name="phone" id="body" class="form-control" value="{{$etudiant->phone}}"></input>
                    </div>
                    <div class="control-group col-12">
                        <label for="email">Courriel</label>
                        <input type="email" name="email" id="body" class="form-control" value="{{$etudiant->email}}"></input>
                    </div>
                    <div class="control-group col-12">
                        <label for="date_de_naissance">Date de naissance</label>
                        <input type="date" name="date_de_naissance" id="body" class="form-control" value="{{$etudiant->date_de_naissance}}"></input>
                    </div>
                    <div class="control-group col-12">
                        <label for='ville_id'>Choisissez votre ville: </label>
                        <select name='ville_id' id='villes-select'>
                            <option value='{{$etudiant->etudiantHasVille->id}}'>{{$etudiant->etudiantHasVille->nom}}</option>
                            @foreach($villes as $ville)
                            <option value="{{$ville->id}}">{{$ville->nom}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="sauvegarder" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>


@endsection