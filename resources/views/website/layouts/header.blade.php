<!DOCTYPE html>
<html lang="en">

<head>
    <title>Alokito Teachers</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Vendor css -->
    <link rel="stylesheet" type="text/css" href="{{asset_url('website/assets/css/vendor-min.css')}}">
    <!-- toaster -->
    <link rel="stylesheet" href="{{asset_url('plugins/toastr/toastr.min.css')}}">

    @yield('css01')
    <!-- Main Stylesheet css -->
    <link rel="stylesheet" type="text/css" href="{{asset_url('website/assets/css/style.css')}}">

    @yield('css02')
</head>

<body id="body">

<!-- Header section start here -->
<header class="header shadow-sm">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="">
                <div class="header-logo">
                    <a href="{{route('website.homepage')}}" class="logo">
                        <img src="{{asset_url('website/assets/images/logo.png')}}" alt="logo">
                    </a>
                </div>
            </div>

            <div class="d-flex justify-content-end align-items-center">
                <nav class="primary-menu">
                    <ul class="main-menu d-flex">
                        <li class="menu-item active"><a href="{{route('website.homepage')}}">Home</a></li>
                        <!-- <li class="menu-item"><a href="">About Us</a></li> -->
                        <li class="menu-item"><a href="{{route('website.courses.all')}}">Courses</a></li>
                        <!-- <li class="menu-item"><a href="resources.html">Resources</a></li> -->
                        <!-- <li class="menu-item"><a href="{{route('website.innovation.all')}}">Innovations</a></li> -->
                        <li class="menu-item"><a href="{{route('website.workshops.all')}}">Workshops</a></li>
                        <!-- <li class="menu-item"><a href="{{route('website.packages.all')}}">Packages</a></li> -->
                        <li class="menu-item"><a href="{{ route('need-assessment.view') }}">Need Assessment</a></li>
                        @if(auth()->guard('web-teacher')->check())
                        <li class="menu-item" style="background-color: #004259;border-radius: 10px;"><a href="{{route('teacher.profile')}}" style="color:#fff">My Profile</a></li>
                        @endif
                    </ul>
                </nav>
                <div class="header-right d-flex align-items-center flex-wrap" style="margin-left:30px;">
                    @if(!auth()->guard('web-teacher')->check())

                    <a href="{{route('website.auth.signup')}}" class="btn btn-default">Join Us</a>

                    @else

                    <a href="" class="btn btn-default" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt" style="margin-right:8px"></i> Sign out</a>

                    <form id="logout-form" action="{{route('website.auth.teacher.signout')}}" method="POST" style="display: none;">@csrf</form>

                    @endif
                    <div class="nav-icon">
                        <div class="menu-icon" title="Menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>

    <div class="mobile-menu-main">
        <div class="mobile-menu">
            <div class="nav-close" title="Close">
                <i class="ri-close-line"></i>
            </div>
            <div class="mobile-menu-card">
                <a href="index.html" class="text-center mobile-logo">
                    <img src="{{asset_url('website/assets/images/logo.png')}}" alt="logo">
                </a>
                <div class="mobile-menu-body">
                    <ul class="main-menu">
                        <li class="menu-item active"><a href="{{route('website.homepage')}}">Home</a></li>
                        <li class="menu-item"><a href="{{route('website.courses.all')}}">Courses</a></li>
                        <!--<li class="menu-item"><a href="resources.html">Resources</a></li>-->
                        <!--<li class="menu-item"><a href="innovations.html">Innovations</a></li>-->
                        <li class="menu-item"><a href="{{route('website.workshops.all')}}">Workshops</a></li>
                        <li class="menu-item"><a href="{{ route('need-assessment.view') }}">Need Assesment</a></li>
                        <!--<li class="menu-item"><a href="">About us</a></li>-->
                        @if(auth()->guard('web-teacher')->check())
                        <li class="menu-item" style="background-color: #004259;border-radius: 10px;"><a href="{{route('teacher.profile')}}" style="color:#fff">My Proile</a></li>
                        @endif
                    </ul>
                    @if(!auth()->guard('web-teacher')->check())
                    <a href="{{route('website.auth.signup')}}" class="btn btn-default">Join Us</a>

                    @else

                    <a href="" class="btn btn-default" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt" style="margin-right:8px"></i> Sign out</a>

                    <form id="logout-form" action="{{route('website.auth.teacher.signout')}}" method="POST" style="display: none;">@csrf</form>

                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header section end here -->