@extends('layouts.app')
@section('title','Registration')
@section('content')

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="{{asset('img/page-bg/2.jpg')}}">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">Accueil</a>
            <span>Enregistrer</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">Enregistrer</h1>
        </div>
    </div>
</div>
<!-- Page info end -->

<div class="row ">
    <div class="col-lg-7 mx-auto mb-5">
        <div class="card mt-5 mx-auto p-4 bg-light">
            <div class="card-body bg-light">
                <div class="container">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if($errors)
                    <ul>
                        @foreach($errors->all() as $error)
                        <li class='text-danger'>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form action="{{route('user.store')}}" method="post">
                        @csrf
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nom">Nom *</label>
                                        <input type="text" placeholder="Nom" class="form-control" name="nom" value="{{old('nom')}}">
                                        @if ($errors->has('nom'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('nom')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Courriel *</label>
                                        <input type="email" placeholder="email" class="form-control" name="email" value="{{old('email')}}">
                                        @if ($errors->has('email'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('email')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Password *</label>
                                        <input type="password" placeholder="password" class="form-control" name="password">
                                        @if ($errors->has('password'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('password')}}
                                        </div>
                                        @endif
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
                                <input type="submit" value="Sauvegarder" class="site-btn btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection