<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin - FITNESYESS</title>

    {{-- Admin Css --}}
    <link rel="stylesheet" href="{{ asset('newAdmin/css_custom/admin.css') }}">
    @yield('addCss')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/newAdmin/dist/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/newAdmin/dist/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/newAdmin/dist/assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="/newAdmin/dist/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/newAdmin/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/newAdmin/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/newAdmin/dist/assets/css/style.css">
    <link rel="stylesheet" href="/newAdmin/dist/assets/css/components.css">

    <!-- Sweet Alert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script src="https://kit.fontawesome.com/2f708729c7.js" crossorigin="anonymous"></script>

    <!-- Instascan  -->
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <ul class="navbar-nav navbar-right ml-auto">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="/newAdmin/dist/assets/img/avatar/avatar-1.png"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->guard('admin')->user()->first_name." ".auth()->guard('admin')->user()->last_name}}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: flex; align-items:center;">
                                @csrf
                                <button type="submit" class="dropdown-item has-icon text-danger" style="border: none; background: none; padding: 0; cursor: pointer; margin-left:10px;">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html"> Gym App</a>
                    </div>
                    <ul class="sidebar-menu">
                        {{-- Dashboard --}}
                        <li class="menu-header">Dashboard</li>
                        <li>
                            <a class="nav-link" href="{{route('dashboardAdmin')}}">
                                <i class="fas fa-chart-line"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        {{-- End Dashboard --}}



                        

                        @if (auth()->guard('admin')->user()->role!='Admin')
                                                    {{-- Data Master --}}
                        <li class="menu-header">Data Master</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                                <span>Data Master</span></a>
                            <ul class="dropdown-menu">
                                <li class="margin-left-neg"><a class="nav-link" href="{{route('tipe-membership.index')}}"> <i
                                    class="fas fa-layer-group"></i>Tipe Membership</a></li>
                                <li class="margin-left-neg"><a class="nav-link" href="{{route('tipe-class.index')}}"> <i
                                    class="fas fa-layer-group"></i>Kategori Class</a></li>
                                <li class="margin-left-neg"><a class="nav-link" href="{{route('data-admin.index')}}"> <i
                                            class="fas fa-user-shield"></i>Data Admin</a></li>
                                <li class="margin-left-neg"><a class="nav-link" href="{{route('data-member.index')}}"> <i
                                            class="fas fa-users"></i>Data Members</a></li>
                                <li class="margin-left-neg"><a class="nav-link" href="{{route('data-trainer.index')}}"> <i
                                            class="fas fa-user-tie"></i>Data Trainer</a></li>
                                <li class="margin-left-neg"><a class="nav-link" href="{{route('data-trial.index')}}"> <i class="fas fa-user"></i>Data
                                        Trial Harian</a></li>
                                <li class="margin-left-neg"><a class="nav-link" href="{{route('data-class.index')}}"> <i
                                            class="fas fa-dumbbell"></i>Data Class</a></li>
                                {{-- <li class="margin-left-neg"><a class="nav-link" href=""> <i class="fas fa-eye"></i>Data
                                        Review</a></li> --}}
    
                            </ul>
                        </li>
                        {{-- end Data Master --}}
                        @else
                        <li class="menu-header">Data Master</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                                <span>Data Master</span></a>
                            <ul class="dropdown-menu">
                                <li class="margin-left-neg"><a class="nav-link" href="{{route('data-member.index')}}"> <i
                                            class="fas fa-users"></i>Data Members</a></li>
                                <li class="margin-left-neg"><a class="nav-link" href="{{route('data-trial.index')}}"> <i class="fas fa-user"></i>Data
                                        Trial Harian</a></li>
    
                            </ul>
                        </li>
                        @endif
                        <!-- Start Features -->
                        <li class="menu-header">Features</li>
                        <li>
                            <a class="nav-link" href="{{route('activityMember')}}">
                                <i class="fas fa-calendar"></i>
                                <span>Activity</span>
                            </a>
                            <a class="nav-link" href="{{route('booking.index')}}">
                                <i class="fas fa-table"></i>
                                <span>Class List & Book</span>
                            </a>
                            {{-- <a class="nav-link" href="{{route('informationGym')}}">
                                <i class="fas fa-bullhorn"></i>
                                <span>Information Gym</span>
                            </a> --}}
                            <a class="nav-link" href="{{route('transaction.index')}}">
                                <i class="fas fa-credit-card"></i>
                                <span>Transaction</span>
                            </a>
                            <!-- End Features -->


                    </ul>
                </aside>
            </div>

            @yield('content')

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024 <div class="bullet"></div> Design By <a href="https://nauval.in/">FitnesYess</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>



    @include('sweetalert::alert')
    <!-- General JS Scripts -->
    <script src="/newAdmin/dist/assets/modules/jquery.min.js"></script>
    <script src="/newAdmin/dist/assets/modules/popper.js"></script>
    <script src="/newAdmin/dist/assets/modules/tooltip.js"></script>
    <script src="/newAdmin/dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="/newAdmin/dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/newAdmin/dist/assets/modules/moment.min.js"></script>
    <script src="/newAdmin/dist/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="/newAdmin/dist/assets/modules/jquery.sparkline.min.js"></script>
    <script src="{{ url('newAdmin') }}/dist/assets/modules/chart.min.js"></script>
    <script src="/newAdmin/dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="/newAdmin/dist/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="/newAdmin/dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="/newAdmin/dist/assets/js/page/index.js"></script>

    <!-- Template JS File -->
    <script src="/newAdmin/dist/assets/js/scripts.js"></script>
    <script src="/newAdmin/dist/assets/js/custom.js"></script>

    {{-- new Js --}}
    @yield('addJavascript')

</body>

</html>