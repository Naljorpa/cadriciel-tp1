@extends('layouts.app')
@section('title','Écrire article')
@section('content')

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">Accueil</a>
            <span>Forum</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">
                Ajouter un article
            </h1>
        </div>
    </div>
</div>

<div class="row ">
    <div class="col-lg-7 mx-auto mb-5">
        <div class="card mt-5 mx-auto p-4 bg-light">

            <div class="card-body bg-light">

                <div class="container">
                    <form method="post">
                        @csrf
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">English *</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Français</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" id="title" name="title" class="form-control" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="body">Message</label>
                                                <textarea name="body" id="body" class="form-control" required="required"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title_fr">Titre</label>
                                                <input type="text" id="title_fr" name="title_fr" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="body_fr">Message</label>
                                                <textarea name="body_fr" id="body_fr" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="sauvegarder" class="site-btn btn-block">
                                </div>
                            </div>
                        </div>
                        <p>* obligatoire</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection