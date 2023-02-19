@extends('layouts.app')
@section('title','Forum')
@section('content')
@php $locale = session()->get('locale'); @endphp
<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">Accueil</a>
            <span>Forum</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">Forum</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <p>
                Enjoy our articles
            </p>

            <a href="{{route('forum.create')}}" class="btn btn-outline-primary">
                Add post
            </a>

        </div>
        
        
        <div class="row mb-5 col-12">
            <div class="col-12">
                @forelse($forums as $forum)
                @if($locale=='en')
                <div class="card mb-5">
                    
                        <div class="card-header">
                            {{ ucfirst($forum->title) }}
                        </div>
                        <div class="card-body">
                            <p>{{ ucfirst($forum->body) }}</p>
                        </div>
                        <div class="card-footer">
                        
                            <p>Author: {{ ucfirst($forum->forumHasUser->nom) }}</p>
                            @if(Auth::user()->id == ucfirst($forum->forumHasUser->id))
                           
                            <a href="{{ route('forum.show', $forum->id) }}">Modifier ou supprimer mon article</a>
                            @else 
                            @endif
                        </div>
                </div>
                @else
                <div class="card mb-5">
                    
                    <div class="card-header">
                        {{ ucfirst($forum->title_fr) }}
                    </div>
                    <div class="card-body">
                        <p>{{ ucfirst($forum->body_fr) }}</p>
                    </div>
                    <div class="card-footer">
                    
                        <p>Author: {{ ucfirst($forum->forumHasUser->nom) }}</p>
                        @if(Auth::user()->id == ucfirst($forum->forumHasUser->id))
                       
                        <a href="{{ route('forum.show', $forum->id) }}">Modifier ou supprimer mon article</a>
                        @else 
                        @endif
                    </div>
            </div>
                @endif
                @empty <p class="text-warning">
                    Aucun article de forum disponible </p>
                @endforelse

            </div>
        </div>


    </div>
</div>

@endsection