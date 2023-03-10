@extends('layouts.app')
@section('title','Ajouter')
@section('content')
@php $locale = session()->get('locale'); @endphp

<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="{{asset('img/page-bg/2.jpg')}}">
    <div class="container mt-5">
        <div class="site-breadcrumb">
            <a href="{{url('/')}}">@lang('lang.home')</a>
            <a href="{{ route('etudiant.index') }}">@lang('lang.studentList')</a>
            <span>@lang('lang.addStudent')</span>
        </div>
        <div class="col-12 text-center ">
            <h1 class="display-one mt-5 text-white">@lang('lang.addStudent')</h1>
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
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                    </div>
                    @endif
                    <form method="post">
                        @csrf
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nom">@lang('lang.name') *</label>
                                        <input type="text" name="nom" class="form-control" placeholder="@lang('lang.svpN')" required value="{{old('name')}}">
                                        @if ($errors->has('nom'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('nom')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">@lang('lang.email') *</label>
                                        <input type="email" name="email" class="form-control" placeholder="@lang('lang.svpE')" required value="{{old('email')}}">
                                        @if ($errors->has('email'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('email')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="addresse">@lang('lang.address') *</label>
                                        <input type="text" name="addresse" class="form-control" placeholder="@lang('lang.enterAdd')" required value="{{old('addresse')}}">
                                        @if ($errors->has('addresse'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('addresse')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for='ville_id'>@lang('lang.selectCity'): </label>
                                        <select name="ville_id" class="form-control" required>
                                            <option value=''>--@lang('lang.select')--</option>
                                            @foreach($villes as $ville)
                                            <option value="{{$ville->id}}">{{$ville->nom}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('ville_id'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('ville_id')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">@lang('lang.phone')</label>
                                        <input type="text" name="phone" id="body" class="form-control" placeholder="(xxx) xxx-xxxx*" required value="{{old('phone')}}"></input>
                                    </div>
                                    @if ($errors->has('phone'))
                                    <div class="text-danger mt-2">
                                        {{$errors->first('phone')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="date_de_naissance">@lang('lang.bd')</label>
                                        <input type="date" name="date_de_naissance" id="body" class="form-control" required="required"></input>
                                        @if ($errors->has('date_de_naissance'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('date_de_naissance')}}
                                        </div>
                                        @endif
                                    </div>
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
            </div>
        </div>
    </div>
</div>

@endsection