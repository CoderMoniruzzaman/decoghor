<!DOCTYPE html>
<html lang="en">

<head>
    <title>DecoGhor</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Faviicon -->
    <link rel="icon" type="image/png" href="{{ asset('images\favicon.ico') }}" />

    <!-- Main -->
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    
    <!-- icon-->
    <link href="{{ asset('fonts/themify-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('css/plugin/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/plugin/slick.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/summernote/summernote-bs4.min.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
   

    
    <script src="{{ asset('js/app.js')}}" defer></script>
    

    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">

</head>

<body class="sidebar-mini app">
    <div class="" id="app">
        
        <!-- Sidebar toogle for media -->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <!--left Sidebar start-->
        <aside class="app-sidebar">
            <!-- logo -->
            <div class="brand">
                <a href="{{url('/home')}}" class="logo"><span>
                    <img src="{{ asset('images/logo/logo.png')}}" alt="logo-small" class="logo-sm">
                    <span>DecoGhor</span>
                </a>
            </div>
          
            <!-- Main sidebar menu -->
            <nav class="sidebar-nav">
                <ul class="metismenu app-menu">
                    <li>
                        <a href="{{url('/home')}}"><i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i data-feather="users" class="align-self-center menu-icon"></i><span>User</span><span class="menu-arrow"><i class="aro ti-angle-right"></i><i class="arod ti-angle-down"></i></span></a>
                        <ul aria-expanded="false">
                            <li>
                                <a  href="{{url('/user')}}"><i class="ti-control-record"></i>User Management</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);"><i data-feather="box" class="align-self-center menu-icon"></i><span>Product</span><span class="menu-arrow"><i class="aro ti-angle-right"></i><i class="arod ti-angle-down"></i></span></a>
                        <ul aria-expanded="false">

                            <li>
                                <a  href="{{url('/product')}}"><i class="ti-control-record"></i>Product List</a>
                            </li>

                            <li>
                                <a  href="{{ url('/product/create') }}"><i class="ti-control-record"></i>Add Products</a>
                            </li>

                            <li>
                                <a  href="{{url('/category')}}"><i class="ti-control-record"></i>Category</a>
                            </li>
                            <li>
                                <a  href="{{url('/subcategory')}}"><i class="ti-control-record"></i>Sub Category</a>
                            </li>
                            <li>
                                <a  href="{{url('/brand')}}"><i class="ti-control-record"></i>Brand</a>
                            </li>
                            <li>
                                <a  href="{{url('/unit')}}"><i class="ti-control-record"></i>Unit</a>
                            </li>

                            <li>
                                <a  href="{{url('/tax')}}"><i class="ti-control-record"></i>Tax</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="/laravel-filemanager"><i data-feather="hard-drive" class="align-self-center menu-icon"></i><span>File Manager</span></a>
                    </li>
                </ul>
            </nav>
        </aside>
        <!--Sidebar menu Part End-->
        <!--Main Content Part -->
        <main class="app-content">
            <!-- Top Navbar -->
            <nav class="app-header app-head-bg">
                <!-- Sidebar toggle button-->
                <a class="app-sidebar-toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><i class="ti-menu"></i></a>

                <!-- Navbar Right Menu-->
                <ul class="app-nav">
                    <!-- search menu-->
                    <li class="dropdown search">
                        <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="">
                            <i class="ti-search"></i>
                        </a>
                        <ul class="dropdown-menu search-box">
                            <li class="app-search-topbar">
                                <form action="#" method="get">
                                    <input type="search" name="search" class="from-control top-search mb-0" placeholder="Type text..."> 
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </li>
                        </ul>
                    </li>

                    <!-- Message menu-->
                    <li class="dropdown message">
                        <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="ti-comment"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu message-box dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{ asset('images/admin@example.png')}}" alt="User Avatar" class="user-small-image mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Johnny Depp
                                            <small class="float-right text-sm">59 min Ago</small>
                                        </h3>
                                        <p class="text-sm">Lorem Ipsum is simply...</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>

                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                <img src="{{ asset('images/admin@example.png')}}" alt="User Avatar" class="user-small-image mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Tom Cruise
                                    <small class="float-right text-sm">2 Hours Ago</small>
                                    </h3>
                                    <p class="text-sm">Lorem Ipsum is simply...</p>
                                </div>
                                </div>
                                <!-- Message End -->
                            </a>


                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                <img src="{{ asset('images/admin@example.png')}}" alt="User Avatar" class="user-small-image mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Kevin Spacey
                                    <small class="float-right text-sm">19 Hours Ago</small>
                                    </h3>
                                    <p class="text-sm">Lorem Ipsum is simply...</p>
                                </div>
                                </div>
                                <!-- Message End -->
                            </a>
                        
                            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li>

                    <!-- notification menu-->
                    <li class="dropdown notification">
                        <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="ti-bell"></i>
                            <span class="badge badge-warning navbar-badge">7</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right notification-box">
                            <span class="dropdown-header">15 Notifications</span>
                            <a href="#" class="dropdown-item">
                                <i class="ti-email mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins ago</span>
                            </a>
                        
                            <a href="#" class="dropdown-item">
                                <i class="ti-user mr-2"></i> 5 friend requests
                                <span class="float-right text-muted text-sm">12 hours ago</span>
                            </a>
                        
                            <a href="#" class="dropdown-item">
                                <i class="ti-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days ago</span>
                            </a>
                            
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                    <!-- Language menu -->
                    <li class="dropdown language-content">
                        <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                            <span class="pr-1">Eng</span><img src="{{asset('images/language/Flag_of_the_United_States.png')}}" alt="" class="lag-img">
                        </a>
                        <ul class="dropdown-menu language-box">
                            <li class="">
                                <a class="dropdown-item" href="#"><img src="{{asset('images/language/Flag_of_the_United_States.png')}}" alt="" class=" lag-img"> <span class="pl-2">English</span> </a>
                            </li>
                            <li class="">
                                <a class="dropdown-item" href="#"><img src="{{asset('images/language/china.jpg')}}" alt="" class=" lag-img"> <span class="pl-2">Chinese</span> </a>
                            </li>
                            <li class="">
                                <a class="dropdown-item" href="#"><img src="{{asset('images/language/russia.jpg')}}" alt="" class=" lag-img"> <span class="pl-2">Russian</span> </a>
                            </li>
                            <li class="">
                                <a class="dropdown-item" href="#"><img src="{{asset('images/language/arabic.png')}}" alt="" class=" lag-img"> <span class="pl-2">Arabic</span> </a>
                            </li>

                            <li class="">
                                <a class="dropdown-item" href="#"><img src="{{asset('images/language/india.png')}}" alt="" class=" lag-img"> <span class="pl-2">Hindi</span> </a>
                            </li>

                            <li class="">
                                <a class="dropdown-item" href="#"><img src="{{asset('images/language/bangladesh.png')}}" alt="" class=" lag-img"> <span class="pl-2">Bengali</span> </a>
                            </li>

                        </ul>
                    </li>

                    <!-- User Menu-->
                    <li class="dropdown user-content">
                        <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                            <span class="pr-1">
                                {{ Auth::user()->name }}
                            </span>
                            <img src="{{ asset('images/user.png')}}" alt="user-image" class="user-d">
                        </a>
                        <ul class="dropdown-menu user-box">
                            <li><a class="dropdown-item" href="#"><i class="ti-user"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="ti-settings"></i>Settings</a></li>
                            <li>
                                <a  class="dropdown-item dropdown-footer" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ti-power-off"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="page-content">
                @yield('content')
            </div>
            
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-content">
                                <div class="footer_copyright">
                                    ©&nbsp;<span><a href="/" target="_blank" class="kt-link">DecoGhor</a> - 2020 &nbsp;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </main>
        <!--Main Content End -->
        <!--Footer Part -->
        
    </div>

    @include('sweetalert::alert')
    @yield('scripts')
    <!--Main Scripts js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" defer></script>
    <script src="{{ asset('js/metismenu.min.js') }}" defer></script>
    <script src="{{ asset('/summernote/summernote-bs4.min.js') }}" defer></script>
    <script src="{{ asset('js/feather.min.js') }}" defer></script>
    <script src="{{ asset('js/slick.min.js') }}" defer></script>
    <!--Custom Scripts js -->
    <script src="{{ asset('js/deco.js')}}" defer></script>
    <!--Custom Scripts js for single page-->
   
   
</body>

</html>
