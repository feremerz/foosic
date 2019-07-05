<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.6
 * @link http://coreui.io
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="fa"  dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,Angular 2,Angular4,Angular 4,jQuery,CSS,HTML,RWD,Dashboard,React,React.js,Vue,Vue.js">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>فوسیک - مدیریت</title>

    <!-- Icons -->
    <link href="{{asset('adminDashboard/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminDashboard/css/simple-line-icons.css')}}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{asset('adminDashboard/css/style.css')}}" rel="stylesheet">
</head>

<!-- BODY options, add following classes to body to change options

// Header options
1. '.header-fixed'					- Fixed Header

// Sidebar options
1. '.sidebar-fixed'					- Fixed Sidebar
2. '.sidebar-hidden'				- Hidden Sidebar
3. '.sidebar-off-canvas'		- Off Canvas Sidebar
4. '.sidebar-minimized'			- Minimized Sidebar (Only icons)
5. '.sidebar-compact'			  - Compact Sidebar

// Aside options
1. '.aside-menu-fixed'			- Fixed Aside Menu
2. '.aside-menu-hidden'			- Hidden Aside Menu
3. '.aside-menu-off-canvas'	- Off Canvas Aside Menu

// Breadcrumb options
1. '.breadcrumb-fixed'			- Fixed Breadcrumb

// Footer options
1. '.footer-fixed'					- Fixed footer

-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">☰</button>
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler sidebar-minimizer d-md-down-none" type="button">☰</button>

    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
            <a class="nav-link" href="#">میزکار</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">کاربران</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">تنظیمات</a>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-danger">5</span></a>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="icon-list"></i></a>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                <span class="d-md-down-none">مدیر سیستم</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>حساب کاربری</strong>
                </div>
                <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> بروزرسانی ها<span class="badge badge-info">42</span></a>
                <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> پیام ها<span class="badge badge-success">42</span></a>
                <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> کارها<span class="badge badge-danger">42</span></a>
                <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> نظرات<span class="badge badge-warning">42</span></a>
                <div class="dropdown-header text-center">
                    <strong>تنظیمات</strong>
                </div>
                <a class="dropdown-item" href="#"><i class="fa fa-user"></i> پروفایل</a>
                <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> تنظیمات</a>
                <a class="dropdown-item" href="#"><i class="fa fa-usd"></i> پرداخت ها<span class="badge badge-default">42</span></a>
                <a class="dropdown-item" href="#"><i class="fa fa-file"></i> پروژه ها<span class="badge badge-primary">42</span></a>
                <div class="divider"></div>
                <a class="dropdown-item" href="#"><i class="fa fa-shield"></i> قفل کردن حساب کاربری</a>
                <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> خروج</a>
            </div>
        </li>
    </ul>
    <button class="navbar-toggler aside-menu-toggler" type="button">☰</button>

</header>

<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.index')}}"><i class="icon-speedometer"></i> میزکار <span class="badge badge-primary">جدید</span></a>
                </li>

                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i>مدیریت کاربران</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('users.index')}}"><i class="icon-people"></i> لیست کاربران</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('users.create')}}"><i class="icon-user-follow"></i> ثبت کاربر</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-user"></i>مدیریت نقش ها</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('roles.index')}}"><i class="icon-user"></i> لیست نقش ها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('roles.create')}}"><i class="icon-user-unfollow"></i> ثبت نقش جدید</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-user"></i>مدیریت دسته بندی ها</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('categories.index')}}"><i class="icon-user"></i> لیست دسته بندی ها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('categories.create')}}"><i class="icon-user-unfollow"></i> ثبت دسته بندی جدید</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-music-tone"></i>مدیریت آلبوم ها</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('albums.index')}}"><i class="icon-music-tone"></i> لیست آلبوم ها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('albums.create')}}"><i class="icon-music-tone-alt"></i> ثبت آلبوم جدید</a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
    </div>

    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">میزکار</li>

            <li class="breadcrumb-item active">میزکار</li>

            <!-- Breadcrumb Menu-->
            <li class="breadcrumb-menu d-md-down-none">
                <div class="btn-group" role="group" aria-label="Button group">
                    <a class="btn" href="#"><i class="icon-speech"></i></a>
                    <a class="btn" href="./"><i class="icon-graph"></i> &nbsp;میزکار</a>
                    <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;تنظیمات</a>
                </div>
            </li>
        </ol>


        <div class="container-fluid">
            @include('partials.messages')
            @yield('content')
        </div>
        <!-- /.conainer-fluid -->
    </main>

    <aside class="aside-menu">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab"><i class="icon-list"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><i class="icon-speech"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#settings" role="tab"><i class="icon-settings"></i></a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="timeline" role="tabpanel">
                <div class="callout m-0 py-2 text-muted text-center bg-light text-uppercase">
                    <small><b>امروز</b>
                    </small>
                </div>
                <hr class="transparent mx-3 my-0">
                <div class="callout callout-warning m-0 py-3">
                    <div class="avatar float-left">
                        <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                    </div>
                    <div>ملاقات با
                        <strong>فرشید</strong>
                    </div>
                    <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 1 - 3pm</small>
                    <small class="text-muted"><i class="icon-location-pin"></i>&nbsp; Palo Alto, CA</small>
                </div>
                <hr class="mx-3 my-0">
                <div class="callout callout-info m-0 py-3">
                    <div class="avatar float-left">
                        <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                    </div>
                    <div>اسکایپ با
                        <strong>مهسا</strong>
                    </div>
                    <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 4 - 5pm</small>
                    <small class="text-muted"><i class="icon-social-skype"></i>&nbsp; On-line</small>
                </div>
                <hr class="transparent mx-3 my-0">
                <div class="callout m-0 py-2 text-muted text-center bg-light text-uppercase">
                    <small><b>فردا</b>
                    </small>
                </div>
                <hr class="transparent mx-3 my-0">
                <div class="callout callout-danger m-0 py-3">
                    <div>پروژه گرافیکی -
                        <strong>زمان بندی</strong>
                    </div>
                    <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 10 - 11pm</small>
                    <small class="text-muted"><i class="icon-home"></i>&nbsp; creativeLabs HQ</small>
                    <div class="avatars-stack mt-2">
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/2.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/3.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/5.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                    </div>
                </div>
                <hr class="mx-3 my-0">
                <div class="callout callout-success m-0 py-3">
                    <div>
                        <strong>#10 استارتاپ</strong>جلسه</div>
                    <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 1 - 3pm</small>
                    <small class="text-muted"><i class="icon-location-pin"></i>&nbsp; Palo Alto, CA</small>
                </div>
                <hr class="mx-3 my-0">
                <div class="callout callout-primary m-0 py-3">
                    <div>
                        <strong>جلسه تیم</strong>
                    </div>
                    <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 4 - 6pm</small>
                    <small class="text-muted"><i class="icon-home"></i>&nbsp; creativeLabs HQ</small>
                    <div class="avatars-stack mt-2">
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/2.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/3.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/5.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                        <div class="avatar avatar-xs">
                            <img src="img/avatars/8.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        </div>
                    </div>
                </div>
                <hr class="mx-3 my-0">
            </div>
            <div class="tab-pane p-3" id="messages" role="tabpanel">
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-right">
                        <div class="avatar">
                            <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                            <span class="avatar-status badge-success"></span>
                        </div>
                    </div>
                    <div>
                        <small class="text-muted">Lukasz Holeczek</small>
                        <small class="text-muted float-left mt-1">1:52 PM</small>
                    </div>
                    <div class="text-truncate font-weight-bold">لورم ایپسوم یا طرح‌نما</div>
                    <small class="text-muted">لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت...</small>
                </div>
                <hr>
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-right">
                        <div class="avatar">
                            <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                            <span class="avatar-status badge-success"></span>
                        </div>
                    </div>
                    <div>
                        <small class="text-muted">Lukasz Holeczek</small>
                        <small class="text-muted float-left mt-1">1:52 PM</small>
                    </div>
                    <div class="text-truncate font-weight-bold">لورم ایپسوم یا طرح‌نما</div>
                    <small class="text-muted">لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت...</small>
                </div>
                <hr>
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-right">
                        <div class="avatar">
                            <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                            <span class="avatar-status badge-success"></span>
                        </div>
                    </div>
                    <div>
                        <small class="text-muted">Lukasz Holeczek</small>
                        <small class="text-muted float-left mt-1">1:52 PM</small>
                    </div>
                    <div class="text-truncate font-weight-bold">لورم ایپسوم یا طرح‌نما</div>
                    <small class="text-muted">لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت...</small>
                </div>
                <hr>
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-right">
                        <div class="avatar">
                            <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                            <span class="avatar-status badge-success"></span>
                        </div>
                    </div>
                    <div>
                        <small class="text-muted">Lukasz Holeczek</small>
                        <small class="text-muted float-left mt-1">1:52 PM</small>
                    </div>
                    <div class="text-truncate font-weight-bold">لورم ایپسوم یا طرح‌نما</div>
                    <small class="text-muted">لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت...</small>
                </div>
                <hr>
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-right">
                        <div class="avatar">
                            <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                            <span class="avatar-status badge-success"></span>
                        </div>
                    </div>
                    <div>
                        <small class="text-muted">Lukasz Holeczek</small>
                        <small class="text-muted float-left mt-1">1:52 PM</small>
                    </div>
                    <div class="text-truncate font-weight-bold">لورم ایپسوم یا طرح‌نما</div>
                    <small class="text-muted">لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت...</small>
                </div>
            </div>
            <div class="tab-pane p-3" id="settings" role="tabpanel">
                <h6>تنظیمات</h6>

                <div class="aside-options">
                    <div class="clearfix mt-4">
                        <small><b>گزینه 1</b>
                        </small>
                        <label class="switch switch-text switch-pill switch-success switch-sm float-left">
                            <input type="checkbox" class="switch-input" checked="">
                            <span class="switch-label" data-on="فعال" data-off="قفل"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div>
                    <div>
                        <small class="text-muted">لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید</small>
                    </div>
                </div>

                <div class="aside-options">
                    <div class="clearfix mt-3">
                        <small><b>گزینه 2</b>
                        </small>
                        <label class="switch switch-text switch-pill switch-success switch-sm float-left">
                            <input type="checkbox" class="switch-input">
                            <span class="switch-label" data-on="On" data-off="Off"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div>
                    <div>
                        <small class="text-muted">لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید</small>
                    </div>
                </div>

                <div class="aside-options">
                    <div class="clearfix mt-3">
                        <small><b>گزینه 3</b>
                        </small>
                        <label class="switch switch-text switch-pill switch-success switch-sm float-left">
                            <input type="checkbox" class="switch-input">
                            <span class="switch-label" data-on="فعال" data-off="قفل"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div>
                </div>

                <div class="aside-options">
                    <div class="clearfix mt-3">
                        <small><b>گزینه 4</b>
                        </small>
                        <label class="switch switch-text switch-pill switch-success switch-sm float-left">
                            <input type="checkbox" class="switch-input" checked="">
                            <span class="switch-label" data-on="فعال" data-off="قفل"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div>
                </div>

                <hr>
                <h6>میزان استفاده از سیستم </h6>

                <div class="text-uppercase mb-1 mt-4">
                    <small><b>CPU Usage</b>
                    </small>
                </div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">348 Processes. 1/4 Cores.</small>

                <div class="text-uppercase mb-1 mt-2">
                    <small><b>Memory Usage</b>
                    </small>
                </div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">11444GB/16384MB</small>

                <div class="text-uppercase mb-1 mt-2">
                    <small><b>SSD 1 Usage</b>
                    </small>
                </div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">243GB/256GB</small>

                <div class="text-uppercase mb-1 mt-2">
                    <small><b>SSD 2 Usage</b>
                    </small>
                </div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">25GB/256GB</small>
            </div>
        </div>
    </aside>


</div>

<footer class="app-footer ltr">
    <a href="http://coreui.io">CoreUI - RTL </a> © 2017 creativeLabs.
    <span class="float-left">Powered by <a href="http://coreui.io">CoreUI</a>
        </span>
</footer>

<!-- Bootstrap and necessary plugins -->
<script src="{{asset('adminDashboard/js/libs/jquery.min.js')}}"></script>
<script src="{{asset('adminDashboard/js/libs/tether.min.js')}}"></script>
<script src="{{asset('adminDashboard/js/libs/bootstrap.min.js')}}"></script>
<script src="{{asset('adminDashboard/js/libs/pace.min.js')}}"></script>

<!-- Plugins and scripts required by all views -->
<script src="{{asset('adminDashboard/js/libs/Chart.min.js')}}"></script>

<!-- CoreUI main scripts -->

<script src="{{asset('adminDashboard/js/app.js')}}"></script>





<!-- Plugins and scripts required by this views -->

<!-- Custom scripts required by this view -->
<script src="{{asset('adminDashboard/js/views/main.js')}}"></script>

</body>

</html>