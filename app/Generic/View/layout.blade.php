@php
    $admin = auth()->user();
@endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <title>Dashboard</title>
    <link href="{{ asset('admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
          media="all">
    <link href="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
          media="all">
    <link href="{{ asset('admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/css/theme.css') }}" rel="stylesheet" media="all">

</head>
<body class="animsition">
<div class="page-wrapper">
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="{{ url('auth/home') }}">
                        <img src="{{ asset('admin/images/icon/logo.png') }}" alt="CoolAdmin"/>
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
{{--                <ul class="navbar-mobile__list list-unstyled">--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('auth/home') }}">--}}
{{--                            <i class="fas fa-coffee"></i>Dashboard</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('auth/category') }}">--}}
{{--                            <i class="fas fa-chart-bar"></i>Category</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('auth/teacher') }}">--}}
{{--                            <i class="fas fa-user"></i>Teachers</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('auth/students') }}">--}}
{{--                            <i class="fas fa-graduation-cap"></i>Students</a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a href="{{ url('auth/setting') }}">--}}
{{--                            <i class="fas fa-cogs"></i>Settings</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('auth/group') }}">--}}
{{--                            <i class="fas fa-group"></i>User Groups</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('auth/user') }}">--}}
{{--                            <i class="fas fa-user-circle"></i>System Users</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
        </nav>
    </header>
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="{{ url('auth/home') }}">
                <img src="{{ asset('admin/images/icon/logo.png') }}" alt="Cool Admin"/>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="{{ ($page == "dashboard")? 'active' : '' }}">
                        <a href="{{ url('auth/home') }}">
                            <i class="fas fa-coffee"></i>Dashboard</a>
                    </li>
                    <li class="{{ ($page == "category")? 'active' : '' }}">
                        <a href="{{ url('auth/category') }}">
                            <i class="fas fa-chart-bar"></i>Categories</a>
                    </li>
                    <li class="{{ ($page == "product")? 'active' : '' }}">
                        <a href="{{ url('auth/product') }}">
                            <i class="fas fa-box"></i>Products</a>
                    </li>
                    <li class="{{ ($page == "user")? 'active' : '' }}">
                        <a href="{{ url('auth/user') }}">
                            <i class="fas fa-user-times"></i>Clients</a>
                    </li>
                    <li class="{{ ($page == "order")? 'active' : '' }}">
                        <a href="{{ url('auth/order') }}">
                            <i class="fas fa-gift"></i>orders</a>
                    </li>
                    <li class="{{ ($page == "worker")? 'active' : '' }}">
                        <a href="{{ url('auth/worker') }}">
                            <i class="fas fa-user"></i>Workers</a>
                    </li>
                    <li class="{{ ($page == "operation")? 'active' : '' }}">
                        <a href="{{ url('auth/operation') }}">
                            <i class="fas fa-tasks"></i>Operations</a>
                    </li>
                    <li class="{{ ($page == "setting")? 'active' : '' }}">
                        <a href="{{ url('auth/setting') }}">
                            <i class="fas fa-cogs"></i>Settings</a>
                    </li>
                    <li class="{{ ($page == "role")? 'active' : '' }}">
                        <a href="{{ url('auth/role') }}">
                            <i class="fas fa-group"></i>Roles</a>
                    </li>
                    <li class="{{ ($page == "permission")? 'active' : '' }}">
                        <a href="{{ url('auth/permission') }}">
                            <i class="fas fa-certificate"></i>Permissions</a>
                    </li>
                    <li class="{{ ($page == "role_permission")? 'active' : '' }}">
                        <a href="{{ url('auth/role_permission') }}">
                            <i class="fas fa-magic"></i>Roles And Permissions</a>
                    </li>
                    <li class="{{ ($page == "user")? 'active' : '' }}">
                        <a href="{{ url('auth/users') }}">
                            <i class="fas fa-user-circle"></i>System Users</a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <div class="page-container">
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap float-right">
                        <div class="header-button">
                            <div class="noti-wrap">
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-comment-more"></i>
                                    <span class="quantity">1</span>
                                    <div class="mess-dropdown js-dropdown">
                                        <div class="mess__title">
                                            <p>You have 2 news message</p>
                                        </div>
                                        <div class="mess__item">
                                            <div class="image img-cir img-40">
                                                <img src="{{ asset('admin/images/icon/avatar-06.jpg') }}"
                                                     alt="Michelle Moreno"/>
                                            </div>
                                            <div class="content">
                                                <h6>Michelle Moreno</h6>
                                                <p>Have sent a photo</p>
                                                <span class="time">3 min ago</span>
                                            </div>
                                        </div>
                                        <div class="mess__item">
                                            <div class="image img-cir img-40">
                                                <img src="{{ asset('admin/images/icon/avatar-04.jpg') }}"
                                                     alt="Diane Myers"/>
                                            </div>
                                            <div class="content">
                                                <h6>Diane Myers</h6>
                                                <p>You are now connected on message</p>
                                                <span class="time">Yesterday</span>
                                            </div>
                                        </div>
                                        <div class="mess__footer">
                                            <a href="#">View all messages</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-email"></i>
                                    <span class="quantity">1</span>
                                    <div class="email-dropdown js-dropdown">
                                        <div class="email__title">
                                            <p>You have 3 New Emails</p>
                                        </div>
                                        <div class="email__item">
                                            <div class="image img-cir img-40">
                                                <img src="{{ asset('admin/images/icon/avatar-06.jpg') }}"
                                                     alt="Cynthia Harvey"/>
                                            </div>
                                            <div class="content">
                                                <p>Meeting about new dashboard...</p>
                                                <span>Cynthia Harvey, 3 min ago</span>
                                            </div>
                                        </div>
                                        <div class="email__item">
                                            <div class="image img-cir img-40">
                                                <img src="{{ asset('admin/images/icon/avatar-05.jpg') }}"
                                                     alt="Cynthia Harvey"/>
                                            </div>
                                            <div class="content">
                                                <p>Meeting about new dashboard...</p>
                                                <span>Cynthia Harvey, Yesterday</span>
                                            </div>
                                        </div>
                                        <div class="email__item">
                                            <div class="image img-cir img-40">
                                                <img src="{{ asset('admin/images/icon/avatar-04.jpg') }}"
                                                     alt="Cynthia Harvey"/>
                                            </div>
                                            <div class="content">
                                                <p>Meeting about new dashboard...</p>
                                                <span>Cynthia Harvey, April 12,,2018</span>
                                            </div>
                                        </div>
                                        <div class="email__footer">
                                            <a href="#">See all emails</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <span class="quantity">3</span>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have 3 Notifications</p>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a email notification</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="content">
                                                <p>Your account has been blocked</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c3 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a new file</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="{{ asset('admin/images/icon/avatar-01.jpg') }}" alt="John Doe"/>
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">john doe</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{ asset('admin/images/icon/avatar-01.jpg') }}"
                                                         alt="John Doe"/>
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">john doe</a>
                                                </h5>
                                                <span class="email">johndoe@example.com</span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-account"></i>Account</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-money-box"></i>Billing</a>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="#">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Result</strong>
                                        </div>
                                        <div class="card-body">
                                            <div
                                                class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                <span class="badge badge-pill badge-danger">Errors</span>
                                                {{ $error }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            @if(session()->has('successful'))
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Result</strong>
                                    </div>
                                    <div class="card-body">
                                        <div
                                            class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">Success</span>
                                            {{ session()->get('successful') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    @yield('content-admin')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Reserved to nevdia ink . design & develop <a
                                        href="http://nevdia.com">nevdia.com</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('admin/vendor/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('admin/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('admin/vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('admin/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>


@php
    \request()->session()->forget('successful');
@endphp

@yield('script')
@yield('delete-script')
</body>
</html>
