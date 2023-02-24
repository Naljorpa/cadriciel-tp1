@extends('layouts.app')
@section('title','Upload document')
@section('content')

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
    <div class="container mt-5">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">@lang('lang.home')</a>
            <a href="{{route('repertoire.index')}}">@lang('lang.rep')</a>
            <span>@lang('lang.addDoc')</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">
                @lang('lang.addDoc')
            </h1>
        </div>
    </div>
</div>

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
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- source: https://bootstrapshuffle.com/classes/navs/tab-pane -->
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
                                                <input type="text" id="title" name="title" class="form-control" required="required">
                                                @if ($errors->has('nom'))
                                                <div class="text-danger mt-2">
                                                    {{$errors->first('title')}}
                                                </div>
                                                @endif
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
                                                <input type="text" id="title_fr" name="title_fr" class="form-control">
                                                @if ($errors->has('nom'))
                                                <div class="text-danger mt-2">
                                                    {{$errors->first('title_fr')}}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="body_fr">@lang('lang.upload')</label>
                                    <input type="file" name="file" id="file" class="form-control">
                                    @if ($errors->has('file'))
                                    <div class="text-danger mt-2">
                                        {{$errors->first('file')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <input type="submit" value="@lang('lang.save')" class="site-btn btn-block">
                            </div>
                        </div>
                    </form>
                </div>
                <p>* @lang('lang.mandatory')</p>
            </div>
        </div>
    </div>
</div>
</div>


@endsection