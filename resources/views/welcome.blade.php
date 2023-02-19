@extends('layouts.app')
@section('title', 'Accueil')
@section('content')

<!-- Hero section -->
<section class="hero-section set-bg" data-setbg="img/bg.jpg">
    <div class="container">
        <div class="hero-text text-white">
            <h2>@lang('lang.welcome')</h2>
        </div>
        <div class="row">
            <div class="col-12 text-center pt-5">
                <a href="{{ route('etudiant.index') }}" class="site-btn">
                @lang('lang.btn-welcome')</a>
            </div>
        </div>
    </div>
</section>
<!-- Hero section end -->

@endsection