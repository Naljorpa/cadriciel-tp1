@extends('layouts.app')
@section('title','Liste d\'étudiants')
@section('content')

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">@lang('lang.home')</a>
            <span>@lang('lang.studentList')</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">@lang('lang.studentList')</h1>
        </div>
    </div>
</div>
<!-- Page info end -->

<div class="container">
    <div class="row">
        <div class="col-12 text-center ">
            <div class="mt-5 mb-5">
                <a href="{{route('etudiant.create')}}" class="site-btn">
                    @lang('lang.addStudent')
                </a>
            </div>
            {{$etudiants}}
        </div>
        <div class="list-group">
            @forelse($etudiants as $etudiant)
            <a class="list-group-item list-group-item-action" href="{{ route('etudiant.show', $etudiant->id) }}">{{ ucfirst($etudiant->nom) }}</a>
            @empty <p class="text-warning">
            @lang('lang.studentNot')</p>
            @endforelse

        </div>

    </div>
</div>

@endsection