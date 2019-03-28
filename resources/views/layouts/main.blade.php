<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nomad tech.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('frontend/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('toast/toastr.css') }}">
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('toast/toastr.min.js') }}"></script>
    <script src="{{ asset('js/subscribers.js') }}"></script>
    
    <style>
        .navbar-nav li:hover > ul.dropdown-menu {
            display: block;
        }
        .dropdown-submenu {
            position:relative;
        }
        .dropdown-submenu > .dropdown-menu {
            top:0;
            display: none;
            left:100%;
            margin-top:-8px;
        }

        /* rotate caret on hover */
        .dropdown-menu > li > a:hover:after {
            text-decoration: underline;
            transform: rotate(-90deg);
        }

        .dropdown>.sub-menu{
            margin-top:-1px;
        }
        .has-search .form-control {
            padding-left: 3.375rem;
            max-height: 40px;
        }
        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 3.375rem;
            height: 2.375rem;
            line-height: 2.775rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }
        .dropdown-item:active{
            background-color: #f8f9fa;
        }
        .nav-link:hover{
            color: black !important;
        }
        @media (max-width: 991.98px) {
            .dropdown-menu{
                display: block;
                max-width: 25em;
                background-color: #f8f9fa;
            }
            .dropdown-item{
                white-space: normal;
            }
            .subsub-menu{
                padding-left: 30px;
            }
            .dropdown-submenu > .dropdown-menu{
                display: block;
                /*margin-left: 20px;*/
            }
        }
        .owl-carousel.owl-drag .owl-item {
            -ms-touch-action: pan-y;
            touch-action: pan-y;
        }
    </style>

</head>
<body>
@php
    $lang = \App::getLocale();
@endphp
<nav class="navbar py-4 navbar-expand-lg ftco_navbar navbar-light bg-light flex-row">
    <div class="container">
        <div class="row d-md-none d-flex">
            <div class="col-md-6 col-lg-6 col-sm-6 col-6 align-items-center">
                <a class="navbar-brand" href="{{ route('index') }}">Nomad<span>TECH</span></a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-6">
                <div class="topper align-items-center">
                    <div class="icon bg-white d-inline-flex justify-content-center align-items-center"><a href="{{ route('locale', ['locale' => 'uz']) }}"><img src="{{ asset('flags/uz.svg') }}" style="width: 100%; border-radius: 5px; border: 1px solid silver" alt="UZ"></a></div>
                    <div class="icon bg-white d-inline-flex justify-content-center align-items-center"><a href="{{ route('locale', ['locale' => 'ru']) }}"><img src="{{ asset('flags/ru.svg') }}" style="width: 100%; border-radius: 5px; border: 1px solid silver" alt="RU"></a></div>
                    <div class="icon bg-white d-inline-flex justify-content-center align-items-center"><a href="{{ route('locale', ['locale' => 'en']) }}"><img src="{{ asset('flags/gb.svg') }}" style="width: 100%; border-radius: 5px; border: 1px solid silver" alt="EN"></a></div>
                </div>
            </div>
        </div>
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="d-none d-md-block col-lg-2 col-md-2 align-items-center">
                <a class="navbar-brand" href="{{ route('index') }}">Nomad<span>TECH</span></a>
            </div>
            <div class="col-lg-10 d-none d-md-block pl-5">
                <div class="row d-flex">
                    <div class="col-md-3 d-flex topper align-items-center">
                        <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
                        <span class="text">
                            @lang('pages.top_address')
                            @if($address)
                                @if($lang == 'uz')
                                    {{ $address->address_ru }}
                                @elseif($lang == 'ru')
                                    {{ $address->address_uz }}
                                @elseif($lang == 'en')
                                    {{ $address->address_uz }}
                                @endif
                            @endif
                        </span>
                    </div>
                    <div class="col-md-4 d-flex topper align-items-center">
                        <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-envelope"></span></div>
                        <span class="text">
                            @lang('pages.top_email')
                            @if($address)
                                {{ $address->email }}
                            @endif
                        </span>
                    </div>
                    <div class="col-md-3 d-flex topper align-items-center">
                        <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">
                            @lang('pages.top_phone')
                            @if($address)
                                {{ $address->phone }}
                            @endif
                        </span>
                    </div>
                    <div class="col-md-2 d-flex topper align-items-center">
                        <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><a href="{{ route('locale', ['locale' => 'uz']) }}"><img src="{{ asset('flags/uz.svg') }}" style="width: 100%; border-radius: 5px; border: 1px solid silver" alt="UZ"></a></div>
                        <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><a href="{{ route('locale', ['locale' => 'ru']) }}"><img src="{{ asset('flags/ru.svg') }}" style="width: 100%; border-radius: 5px; border: 1px solid silver" alt="RU"></a></div>
                        <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><a href="{{ route('locale', ['locale' => 'en']) }}"><img src="{{ asset('flags/gb.svg') }}" style="width: 100%; border-radius: 5px; border: 1px solid silver" alt="EN"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark  ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <div class="row">
            <button class="col-md-4 col-4 navbar-toggler d-block d-md-none d-xl-none d-lg-none" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="order-lg-last col-md-8 col-8 d-block d-md-none d-xl-none d-lg-none">
                <form action="{{ route('search') }}">
                    <div class="input-group has-search">
                        <label for="search"></label>
                        <input id="search" type="search" class="form-control" style="border-bottom-left-radius: 30px; border-top-left-radius: 30px; padding-left: 15px" name="search" value="{{ $q }}">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="order-lg-last d-none d-md-block d-lg-block d-xl-block">
            <form action="{{ route('search') }}">
                    <div class="input-group has-search">
                        <label for="search"></label>
                        <input id="search" type="search" class="form-control" style="border-bottom-left-radius: 30px; border-top-left-radius: 30px; padding-left: 20px;" name="search" value="{{ $q }}">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit">Search</button>
                        </div>
                    </div>
            </form>
        </div>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown active">
                    <a href="{{ route('index') }}" class="dropdown-item nav-link">@lang('pages.home')</a>
                </li>
                @foreach($menus as $menu)
                    <li class="nav-item dropdown">
                        <a href="{{ route('page.show', ['menu' => $menu]) }}" class="dropdown-item {{ $menu->status==2?'dropdown-toggle':'' }} nav-link">
                            @if($lang == 'uz')
                                {{ $menu->menu_uz }}
                            @elseif($lang == 'ru')
                                {{ $menu->menu_ru }}
                            @elseif($lang == 'en')
                                {{ $menu->menu_en }}
                            @endif
                        </a>
                        <ul class="sub-menu  {{ $menu->status==2?'dropdown-menu':'' }}">
                            @foreach($menu->child as $submenu)
                                <li class="nav-item dropdown-submenu">
                                    <a class="dropdown-item {{ $submenu->status==2?'dropdown-toggle':'' }}" href="{{ route('page.content', ['menu' => $menu, 'submenu' => $submenu]) }}">
                                        @if($lang == 'uz')
                                            {{ $submenu->menu_uz }}
                                        @elseif($lang == 'ru')
                                            {{ $submenu->menu_ru }}
                                        @elseif($lang == 'en')
                                            {{ $submenu->menu_en }}
                                        @endif
                                    </a>
                                    <ul class="{{ $submenu->status==2?'dropdown-menu':'' }} subsub-menu">
                                        @foreach($submenu->child as $child_menu)
                                            <li>
                                                <a class="dropdown-item" href="{{ route('page.content', ['menu' => $menu, 'submenu' => $child_menu]) }}">
                                                    @if($lang == 'uz')
                                                        {{ $child_menu->menu_uz }}
                                                    @elseif($lang == 'ru')
                                                        {{ $child_menu->menu_ru }}
                                                    @elseif($lang == 'en')
                                                        {{ $child_menu->menu_en }}
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2 logo">Nomad<span>TECH</span></h2>
                </div>
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">@lang('pages.have_question')</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li>
                                <span class="icon icon-map-marker"></span><span class="text">
                                    @if($address)
                                        @if($lang == 'uz')
                                            {{ $address->address_uz }}
                                        @elseif($lang == 'ru')
                                            {{ $address->address_ru }}
                                        @elseif($lang == 'en')
                                            {{ $address->address_en }}
                                        @endif
                                    @endif
                                </span>
                            </li>
                            <li>
                                <a href="tel:{{ $address->phone }}">
                                    <span class="icon icon-phone"></span>
                                    <span class="text">
                                    @if($address)
                                        {{ $address->phone }}
                                    @endif
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:{{ $address->email }}">
                                    <span class="icon icon-envelope"></span>
                                    <span class="text">
                                    @if($address)
                                        {{ $address->email }}
                                    @endif
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        @foreach($socials as $social)
                            <li class="ftco-animate"><a href="{{ $social->url }}" target="_blank"><span class="{{ $social->icon }}"></span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-5 ml-md-4">
                    <h2 class="ftco-heading-2">@lang('pages.links')</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('index') }}"><span class="ion-ios-arrow-round-forward mr-2"></span>@lang('pages.home')</a></li>
                        @foreach($footer_menus as $footer_menu)
                            <br>
                            <li>
                                <a href="{{ route('page.show', ['menu' => $footer_menu]) }}"><span class="ion-ios-arrow-round-forward mr-2"></span>
                                    @if($lang == 'uz')
                                        {{ $footer_menu->menu_uz }}
                                    @elseif($lang == 'en')
                                        {{ $footer_menu->menu_en }}
                                    @elseif($lang == 'ru')
                                        {{ $footer_menu->menu_ru }}
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">@lang('pages.open_time_title')</h2>
                    <h3 class="open-hours pl-4"><span class="ion-ios-time mr-3"></span>@lang('pages.open_time')</h3>
                </div>
                <div class="ftco-footer-widget mb-5">
                    <h2 class="ftco-heading-2">@lang('pages.subscribe_us')</h2>
                    <form action="{{ route('subscribers') }}" class="subscribe-form">
                        <div class="form-group">
                            <input type="email" class="form-control mb-2 text-center subscriber" name="subscribers" placeholder="Enter email address">
                            <input type="submit" value="@lang('pages.subscribe_button')" class="form-control submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site created by company
                    <a href="">"Nomad-TECH"</a>
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
    </svg>
</div>

<script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/aos.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>--}}
{{--<script src="{{ asset('frontend/js/google-map.js') }}"></script>--}}
<script src="{{ asset('frontend/js/main.js') }}"></script>

</body>
</html>
