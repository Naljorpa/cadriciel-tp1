@extends('layouts.app')
@section('title','Forum')
@section('content')
@php $locale = session()->get('locale'); @endphp
<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">@lang('lang.home')</a>
            <span>@lang('lang.forum')</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">@lang('lang.forum')</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5 pb-5">
            <h2>
                @lang('lang.enjoy')
            </h2>
        </div>
        <div class="col-12 text-center pt-3 pb-5">
            <a href="{{route('forum.create')}}" class="site-btn">
                @lang('lang.addPost')
            </a>
        </div>
        {{$forums}}

        <div class="row mb-5 col-12">
            <div class="col-12">
                @forelse($forums as $forum)
                @if($locale=='en'|| $forum->title_fr == null)
                <div class="card mb-5">

                    <div class="card-header">
                        <h3>{{ ucfirst($forum->title) }}</h3>
                    </div>
                    <div class="card-body">
                        <p>{{ ucfirst($forum->body) }}</p>
                    </div>
                    <div class="card-footer">

                        <p>@lang('lang.author'): {{ ucfirst($forum->forumHasUser->nom) }}</p>
                        @if(Auth::user()->id == ucfirst($forum->forumHasUser->id))

                        <a href="{{ route('forum.show', $forum->id) }}">@lang('lang.modSup')</a>
                        @else
                        @endif
                    </div>
                </div>
                @else
                <div class="card mb-5">

                    <div class="card-header">
                        <h3>{{ ucfirst($forum->title_fr) }}</h3>
                    </div>
                    <div class="card-body">
                        <p>{{ ucfirst($forum->body_fr) }}</p>
                    </div>
                    <div class="card-footer">

                        <p>@lang('lang.author'): {{ ucfirst($forum->forumHasUser->nom) }}</p>
                        @if(Auth::user()->id == ucfirst($forum->forumHasUser->id))

                        <a href="{{ route('forum.show', $forum->id) }}">@lang('lang.modSup')</a>
                        @else
                        @endif
                    </div>
                </div>
                @endif
                @empty <p class="text-warning">
                @lang('lang.notAvail') </p>
                @endforelse

            </div>
        </div>


    </div>
</div>

@endsection