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
                Mon article
            </h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <a href="{{route('forum.index')}}" class="btn btn-outline-primary btn-sm">Retourner</a>
            <hr>
            <div class="row">
            </div>
            <h4 class="display-one">
                {{ ucfirst($forum->title) }}
            </h4>
            <hr>
        </div>

        <div class="row mb-5 col-12">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {!! $forum->body !!}
                    </div>
                    <div class="card-footer">
                        <p><strong>Author: </strong>{{$forum->forumHasUser->nom}}</p>
                        <p><strong>Date: </strong>{{$forum->created_at}}</p>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <div class="row text-center mb-2">
        <div class="col-6">
            <a href="{{ route('forum.edit', $forum->id)}}" class="btn btn-success">Mettre a jour</a>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer un article</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous certain de vouloir effacer cette donnée?
            </div>
            <div class="modal-footer">
                <form action="{{ route('forum.edit', $forum->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="Effacer">
                </form>
            </div>
        </div>
    </div>
</div>


@endsection