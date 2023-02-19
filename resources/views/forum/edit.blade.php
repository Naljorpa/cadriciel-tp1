@extends('layouts.app')
@section('title','Mon article')
@section('content')

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="{{asset('img/page-bg/1.jpg')}}">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">Accueil</a>
            <span>Forum</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">
                Modifier mon article
            </h1>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <form method="post">
                @csrf
                @method('put')
                <div class="card-header">
                    Formulaire
                </div>
                <div class="card-body">
                    <div class="control-group col-12">
                        <label for="title">Titre du message</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{$forum->title}}">
                    </div>
                    <div class="control-group col-12">
                        <label for="body">Message</label>
                       <textarea name="body" id="body" class="form-control">{{$forum->body}}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Modifier" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>



@endsection