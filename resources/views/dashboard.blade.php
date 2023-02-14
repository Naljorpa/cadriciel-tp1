@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<!-- Hero section -->
<section class="hero-section set-bg" data-setbg="img/bg.jpg">
    <div class="container">
        <div class="hero-text text-white">
            <h2>Bienvenue {{ Auth::user()->nom }}</h2>
        </div>
        <div class="row">
            <div class="col-12 text-center pt-5">
                <a href="" class="site-btn">
                    Accéder au forum</a>
            </div>
        </div>
    </div>
</section>
<!-- Hero section end -->

@endsection