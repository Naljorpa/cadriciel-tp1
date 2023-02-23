<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name')}}: @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="description" content="WebUni Education Template">
    <meta name="keywords" content="webuni, education, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset ('css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{ asset ('css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{ asset ('css/style.css')}}" />

    <!--CDN mdbootstrap-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
    @php $locale = session()->get('locale'); @endphp
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header section -->
    <header class="header-section">
        <div class="container ">
            <div class="row bk-pale pt-4 pb-4">
                <div class="col-lg-3 col-md-5 flexer">
                    <div class="site-logo">
                        <img src="{{ asset ('img/college_maisonneuve.png')}} " alt="">
                    </div>
                    <div class="nav-switch">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7 flexer">
                    <nav class="main-menu flexer">
                        <ul>

                            <li><a class="navbar-brand" href="{{route('dashboard')}}">
                                    @if(Auth::check()) @lang('lang.greetings') {{ Auth::user()->nom }} @endif</a></li>
                            <li><a href="{{url('/')}}">@lang('lang.home')</a></li>
                            <li><a href="{{ route('etudiant.index') }}">@lang('lang.studentList')</a></li>
                            @guest
                            @else
                            <li><a href="{{route('forum.index')}}">Forum</a></li>
                            @endguest
                            <li><a class="nav-link @if($locale=='en'||$locale==null) lang @endif" href="{{route('lang', 'en')}}"><i class="flag flag-united-states"></i> En</a></li>
                            <li><a class="lang-fr nav-link @if($locale=='fr') lang @endif" href="{{route('lang', 'fr')}}"><i class="flag flag-france"></i> Fr</a></li>

                        </ul>
                        <ul>
                            @guest
                            <li><a class="site-btn header-btn" href="{{route('user.create')}}">@lang('lang.registration')</a></li>
                            <li><a class="site-btn header-btn" href="{{route('login')}}">@lang('lang.login')</a></li>
                            @else
                            <li><a class="site-btn header-btn" href="{{route('logout')}}">@lang('lang.logout')</a></li>
                            @endguest
                            {{-- <li><a class="nav-link @if($locale=='en') bg-secondary @endif" href="{{route('lang', 'en')}}">En <i class="flag flag-united-states"></i></a></li>
                            <li><a class="nav-link @if($locale=='fr') bg-secondary @endif" href="{{route('lang', 'fr')}}">Fr <i class="flag flag-france"></i></a></li> --}}
                        </ul>
                    </nav>



                </div>
            </div>
        </div>
    </header>
    <!-- Header section end -->
    @yield('content')

</body>
<footer class="footer-section  pb-0">

    <div class="footer-bottom">
        <div class="footer-warp">
            <ul class="footer-menu">
                <li><a href="#">@lang('lang.terms')</a></li>
                <li><a href="#">@lang('lang.register')</a></li>
                <li><a href="#">@lang('lang.privacy')</a></li>
            </ul>
            <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                &copy;<script>
                    document.write(new Date().getFullYear());
                </script> @lang('lang.rights') <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
        </div>
    </div>
</footer>
<!-- footer section end -->


<!--====== Javascripts & Jquery ======-->
<script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/mixitup.min.js')}}"></script>
<script src="{{ asset('js/circle-progress.min.js')}}"></script>
<script src="{{ asset('js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('js/main.js')}}"></script>

</html>