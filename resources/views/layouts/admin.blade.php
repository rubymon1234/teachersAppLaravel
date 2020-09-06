<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>{{ config('app.name', 'StallBooking') }} :: @yield('title')</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('adminside/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminside/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminside/assets/css/pe-icon-7-stroke.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminside/assets/css/style.css') }}">
   {{--  <link rel="stylesheet" href="{{ asset('adminside/assets/css/datepicker.css') }}"> --}}
   <link rel="stylesheet" href="{{ asset('adminside/assets/css/multiselectDateRange.css') }}">
</head>
<body>
    <!-- Lef t Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @permission('admin.home')
                        <li {{ (Route::is('adminhome') ? 'class=active' : '') }}>
                            <a href="{{ route('adminhome') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                        </li>
                    @endpermission
                    @permission(('acl.*'))
                        <li class="menu-item-has-children dropdown {{ (Route::is('acl.*') ? 'show' : ''|| Route::is('assign.*') ? 'show' : '') }}">
                            <a href="" class='dropdown-toggle ' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-unlock-alt"></i>Role Management</a>

                            <ul class="sub-menu children dropdown-menu {{ (Route::is('acl.role.*') ? 'show' : '' || Route::is('acl.perms.*') ? 'show' : '') }}">
                                
                              <li {{ (Route::is('acl.role.*') ? 'class=active' : '' || Route::is('assign.role.*') ? 'class=active' : '') }}>
                                  <a href="{{ route('acl.role.view') }}">
                                  <i class="fa fa-lock"></i> List Role </a> 
                              </li>
                                @permission('acl.perms.view')
                                    <li {{ (Route::is('acl.perms.*') ? 'class=active' : '') }}>
                                        <a href="{{ route('acl.perms.view') }}">
                                        <i class="fa fa-unlock"></i> List Permission </a> 
                                    </li>
                                @endpermission
                            </ul>
                        </li>
                    @endpermission
                    @permission('admin.viewer')
                        <li {{ (Route::is('admin.viewer') ? 'class=active' : '') }}>
                            <a href="{{ route('admin.viewer') }}"><i class="menu-icon fa fa-laptop"></i> Viewers </a>
                        </li>
                    @endpermission
                    <li {{ (Route::is('admin.user.listing') ? 'class=active' : '') }}>
                        <a href="{{ route('admin.user.listing') }}"><i class="menu-icon fa fa-laptop"></i> User Management </a>
                    </li>
                    <li {{ (Route::is('admin.user.contactUs') ? 'class=active' : '') }}>
                        <a href="{{ route('admin.user.contactUs') }}"><i class="menu-icon fa fa-laptop"></i> Contact Us </a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./">{{-- <img src="{{ asset('adminside/images/logo.png') }}" alt="Logo"> --}} Teachers App</a>
                    <a class="navbar-brand hidden" href="./"><img src="{{ asset('adminside/images/logo2.png') }}" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <div class="dropdown for-message hoverTrigger">
                            {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">4</span>
                            </button> --}}
                            {{-- <div class="dropdown-menu hoverShow" aria-labelledby="message">
                                <p class="red">You have 4 Unreaded Mails</p>
                                <a class="dropdown-item media" href="#">
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>New Order, ST26, The Rocks Market, Sydney</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>New Order, ST26, The Rocks Market, Sydney</p>
                                    </div>
                                </a>
                            </div> --}}
                        </div>
                    </div>

                    <div class="user-area dropdown float-right hoverTrigger">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('adminside/images/admin.jpg') }}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu hoverShow">
                            {{-- <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a> --}}

                            {{-- <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a> --}}
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" {{ __('Logout') }} class="nav-link"><i class="fa fa-power -off"></i>Log out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
            @yield('content')
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; <?php echo date('Y'); ?> TeachersApp Admin Panel
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="tel:8220509953">Ruby Tech</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
    <!-- Scripts -->
    <script src="{{ asset('adminside/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('adminside/assets/js/multiselectDateRange.js') }}"></script>
    <script src="{{ asset('adminside/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminside/assets/js/jquery.matchHeight.min.js') }}"></script>
    <script src="{{ asset('adminside/assets/js/main.js') }}"></script>
    <script src="{{ asset('adminside/assets/js/utils.js') }}"></script>
    <script src="{{ asset('adminside/assets/js/chart.min.js') }}"></script>
</body>
</html>
