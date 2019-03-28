<!DOCTYPE html>
<html lang="uz">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Nomad TECHNO">
    <meta name="author" content="Nomad techno">
    <meta name="keywords" content="Nomad techno">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <script src="{{ asset('admin_files/vendor/jquery-3.2.1.min.js') }}"></script>
    <link href="{{ asset('admin_files/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin_files/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- Vendor CSS-->
    <link href="{{ asset('admin_files/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    
    <!-- Main CSS-->
    <link href="{{ asset('admin_files/css/theme.css') }}" rel="stylesheet" media="all">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckeditor/lang/en.js') }}"></script>
    <script src="{{ asset('ckeditor/lang/ru.js') }}"></script>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js.map"></script>--}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="{{ route('admin.index') }}">
                        <img src="{{ asset('admin_files/images/icon/logo.png') }}" alt="CoolAdmin" />
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="{{ $is_active=='index'?'active':'' }} has-sub">
                        <a class="" href="{{ route('admin.index') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="has-sub {{ $is_active=='menus'?'active':'' }}">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-server"></i>
                            Page options
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{ route('sliders.index') }}">Sliders</a>
                            </li>
                            <li>
                                <a href="{{ route('menus.index') }}">Menus</a>
                            </li>
                            <li>
                                <a href="{{ route('technologies.index') }}">Technologies</a>
                            </li>
                            <li>
                                <a href="{{ route('what_we_offers.index') }}">Offers</a>
                            </li>
                            <li>
                                <a href="{{ route('certificats.index') }}">Certificats</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub {{ $is_active=='object'?'active':'' }}">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-copy"></i>
                                Object options
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{ route('objects.index') }}">Objects</a>
                            </li>
                            <li>
                                <a href="{{ route('object_galleries.index') }}">Object galleries</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="{{ route('admin.index') }}">
                <img src="{{ asset('admin_files/images/icon/logo.png') }}" alt="Cool Admin" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="{{ $is_active=='index'?'active':'' }}">
                        <a href="{{ route('admin.index') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="has-sub {{ $is_active=='menus'?'active':'' }}">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-server"></i>
	                            Page options
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="{{ route('sliders.index') }}">Sliders</a>
                            </li>
                            <li>
                                <a href="{{ route('address.index') }}">Address</a>
                            </li>
                            <li>
                                <a href="{{ route('menus.index') }}">Menus</a>
                            </li>
                            <li>
                                <a href="{{ route('technologies.index') }}">Technologies</a>
                            </li>
                            <li>
                                <a href="{{ route('what_we_offers.index') }}">Offers</a>
                            </li>
                            <li>
                                <a href="{{ route('certificats.index') }}">Certificats</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub {{ $is_active=='objects'?'active':'' }}">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-building"></i>
	                            Object options
	                        <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
	                        <li>
		                        <a href="{{ route('objects.index') }}">Objects</a>
	                        </li>
	                        <li>
		                        <a href="{{ route('object_galleries.index') }}">Object galleries</a>
	                        </li>
                        </ul>
                    </li>
                    <li class="{{ $is_active=='social_network'?'active':'' }}">
                        <a href="{{ route('social_networks.index') }}">
                            <i class="fab fa-internet-explorer"></i>
                            Social networks
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->
    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header" action="" method="POST">
                            {{--<input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>--}}
                        </form>
                        <div class="header-button">
                            <div class="noti-wrap">
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-settings"></i>
                                    <span>{{ App::getLocale() }}</span>
                                    <div class="notifi-dropdown js-dropdown">
                                        <a href="{{ route('locale', ['locale' => 'uz']) }}" class="notifi__item">
                                            <div class="img-cir img-40">
                                                <img src="{{ asset('flags/uz.svg') }}" alt="" style="height: 100%">
                                            </div>
                                            <div class="content">
                                                <p>ЎЗ</p>
                                            </div>
                                        </a>
                                        <a href="{{ route('locale', ['locale' => 'ru']) }}" class="notifi__item">
                                            <div class="img-cir img-40">
                                                <img src="{{ asset('flags/ru.svg') }}" alt="" style="height: 100%">
                                            </div>
                                            <div class="content">
                                                <p>РУ</p>
                                            </div>
                                        </a>
                                        <a href="{{ route('locale', ['locale' => 'en']) }}" class="notifi__item">
                                            <div class="img-cir img-40">
                                                <img src="{{ asset('flags/gb.svg') }}" alt="" style="height: 100%">
                                            </div>
                                            <div class="content">
                                                <p>ENG</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="{{ asset('storage') .'/'. Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" />
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{ asset('storage') .'/'. Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">{{ Auth::user()->name }}</a>
                                                </h5>
                                                <span class="email">{{ Auth::user()->email }}</span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="{{ route('index') }}" target="_blank">
                                                    <i class="zmdi zmdi-home"></i>Home</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="{{ route('user.account.edit') }}">
                                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                                            </div>
                                            @guest
                                                ok
                                            @else
                                                <div class="account-dropdown__footer">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                        <i class="zmdi zmdi-power"></i>
                                                        Logout
                                                    </a>
            
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
    </div>
<!-- HEADER DESKTOP-->

<!-- Jquery JS-->
<!-- Bootstrap JS-->
<script src="{{ asset('admin_files/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('admin_files/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<!-- Vendor JS       -->
<script src="{{ asset('admin_files/vendor/slick/slick.min.js') }}">
</script>
<script src="{{ asset('admin_files/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('admin_files/vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('admin_files/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
</script>
<script src="{{ asset('admin_files/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('admin_files/vendor/counter-up/jquery.counterup.min.js') }}">
</script>
<script src="{{ asset('admin_files/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('admin_files/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin_files/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('admin_files/vendor/select2/select2.min.js') }}">
</script>

<!-- Main JS-->
<script src="{{ asset('admin_files/js/main.js') }}"></script>

</body>

</html>
<!-- end document-->
