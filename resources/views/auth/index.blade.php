@extends('layouts.app')
@section('title','Login')
@section('content')

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="{{asset('img/page-bg/2.jpg')}}">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">@lang('lang.home')</a>
            <span>@lang('lang.login')</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">@lang('lang.login')</h1>
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
                    <form action="{{route('user.auth')}}" method="post">
                        @csrf
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">@lang('lang.email') *</label>
                                        <input type="email" placeholder="@lang('lang.svpE')" class="form-control" name="email" value="{{old('email')}}">
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
                                        <label for="password">@lang('lang.password') *</label>
                                        <input type="password" placeholder="@lang('lang.svpP')" class="form-control" name="password">
                                        @if ($errors->has('password'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('password')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="Connecter" class="site-btn btn-block">
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