@extends('layouts.app')
@section('title','Mon article')
@section('content')

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="{{asset('img/page-bg/1.jpg')}}">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">@lang('lang.home')</a>
            <a href="{{route('forum.index')}}">@lang('lang.forum')</a>
            <span>@lang('lang.myArt')</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">
                @lang('lang.myArt')
            </h1>
        </div>
    </div>
</div>

<div class="row ">
    <div class="col-lg-7 mx-auto mb-5">
        <div class="card mt-5 mx-auto p-4 mb-5 bg-light">

            <div class="card-body bg-light">

                <div class="container">

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"> @lang('lang.english') *</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> @lang('lang.french')</button>
                        </div>
                    </nav>
                    <div class="tab-content mt-5 " id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>@lang('lang.title')</h2>
                                        <p> {!! $forum->title !!}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>@lang('lang.message')</h3>
                                        <p> {!! $forum->body !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>@lang('lang.title')</h2>
                                        <p> {!! $forum->title_fr !!}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>@lang('lang.message')</h3>
                                        <p> {!! $forum->body_fr !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 autDate">

                            <p><small><strong>@lang('lang.author'): </strong>{{$forum->forumHasUser->nom}}</small></p>
                            <p><small><strong>@lang('lang.date'): </strong>{{$forum->created_at}}</small></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(Auth::user()->id == ucfirst($forum->forumHasUser->id))

        <div class="row text-center mb-2">
            <div class="col-6">
                <a href="{{ route('forum.edit', $forum->id)}}" class="site-btn btn-success">@lang('lang.update')</a>
            </div>
            <div class="col-6">
                <button type="button" class="site-btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    @lang('lang.delete')
                </button>

            </div>
        </div>
        @else
        @endif

    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.eraseArt')</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @lang('lang.eraseSure')
            </div>
            <div class="modal-footer">
                <form action="{{ route('forum.edit', $forum->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="@lang('lang.delete')">
                </form>
            </div>
        </div>
    </div>
</div>


@endsection