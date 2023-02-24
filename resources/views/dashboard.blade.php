@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<!-- Hero section -->
<section class="hero-section set-bg" data-setbg="img/bg.jpg">
    <div class="container">
        <div class="hero-text text-white">
            <h2>@lang('lang.welcome') {{ Auth::user()->nom }}</h2>
        </div>
        <div class="row">
            <div class="col-md-6 text-center pt-5">
                <a href="{{route('forum.index')}}" class="site-btn">
                @lang('lang.access')</a>
            </div>
            <div class="col-md-6 text-center pt-5">
                <a href="{{route('repertoire.index')}}" class="site-btn">
                @lang('lang.repertoire')</a>
            </div>
        </div>
    </div>
</section>
<!-- Hero section end -->

@endsection