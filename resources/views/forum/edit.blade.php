@extends('layouts.app')
@section('title','Edit article')
@section('content')

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="{{asset('img/page-bg/1.jpg')}}">
    <div class="container mt-5">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">@lang('lang.home')</a>
            <a href="{{route('forum.index')}}">@lang('lang.forum')</a>
            <span>@lang('lang.modArt')</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">
                @lang('lang.modArt')
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
                        @method('put')
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"> @lang('lang.english') *</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> @lang('lang.french')</button>
                            </div>
                        </nav>
                        <div class="tab-content mt-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">@lang('lang.title')</label>
                                                <input type="text" id="title" name="title" class="form-control" required="required" value="{{$forum->title}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="body">@lang('lang.message')</label>
                                                <textarea name="body" id="body" class="form-control" required="required">{{$forum->body}}</textarea>
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
                                                <label for="title_fr">@lang('lang.title')</label>
                                                <input type="text" id="title_fr" name="title_fr" class="form-control" value="{{$forum->title_fr}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="body_fr">@lang('lang.message')</label>
                                                <textarea name="body_fr" id="body_fr" class="form-control">{{$forum->body_fr}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <input type="submit" value="@lang('lang.update')" class="site-btn btn-block">
                                </div>
                            </div>
                        </div>
                        <p>* @lang('lang.mandatory')</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection