@extends('layouts.app')
@section('title','Ajouter')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-2">
            <h1 class="display-one">Ajouter un étudiant</h1>
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
                        <input type="text" id="title" name="nom" class="form-control">
                    </div>
                    <div class="control-group col-12">
                        <label for="addresse">addresse</label>
                       <textarea name="addresse" id="body" class="form-control"></textarea>
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