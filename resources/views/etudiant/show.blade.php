@extends('layouts.app')
@section('title','Détail d\'étudiant')
@section('content')

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="{{asset('img/page-bg/4.jpg')}}">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">@lang('lang.home')</a>
            <a href="{{ route('etudiant.index') }}">@lang('lang.studentList')</a>
            <span>@lang('lang.detail')</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">@lang('lang.detail')</h1>
        </div>
    </div>
</div>
<!-- Page info end -->

<div class="container">
    <div class="row">
        <div class="col-12  pt-5 pb-5">
            <div class="text-center pt-5">
                <div class="blue-maisonneuve pt-3 pb-5">
                    <h2 class="display-one mt-5 blue-maisonneuve-h1">{{ ucfirst($etudiant->nom) }}</h2>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>@lang('lang.bd')</strong>:</p>
                        </div>
                       
                        <div class="col-md-6">
                            <p>{!! $etudiant->date_de_naissance !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>@lang('lang.address')</strong>:</p>
                        </div>
                        
                        <div class="col-md-6">
                            <p>{!! $etudiant->addresse !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>@lang('lang.city')</strong>:</p>
                        </div>
                       
                        <div class="col-md-6">
                            <p>{!! $etudiant->etudiantHasVille->nom !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>@lang('lang.phone')</strong>:</p>
                        </div>
                        
                        <div class="col-md-6">
                            <p>{!! $etudiant->phone !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>@lang('lang.email')</strong>:</p>
                        </div>
                       
                        <div class="col-md-6">
                            <p>{!! $etudiant->email !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>@lang('lang.id')</strong>:</p>
                        </div>
                      
                        <div class="col-md-6">
                            <p>{{$etudiant->user_id}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
  
</div>


@endsection