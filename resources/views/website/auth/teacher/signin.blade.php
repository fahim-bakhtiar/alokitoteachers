@extends('website.layouts.base')

@section('page-content')

<!-- Login section start here -->
<section class="login-section">
    <div class="container">
        <h2 class="d-none d-md-block">Welcome to Alokito Teachers</h2>
        <p class="d-none d-md-block">The Hub for Productive Teachers</p>
        <hr>
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        <div class="row align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-8">
                <img src="{{asset_url('website/assets/images/login.png')}}" alt="login-thumb">
            </div>
            <div class="col-md-4">
                <h2 class="fw-400 mb-0 text-center">Sign-In</h2>
                <p class="mb-60 text-center">Start your journey now</p>
                <form action="{{route('website.auth.teacher.signin')}}" class="login-form mb-20" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="email" class="fw-500 mb-2">E-Mail</label>
                        <input id="email" type="text" name="email" class="form-control" placeholder="Your email address"/>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password" class="fw-500 mb-2">Password</label>
                        <input id="password" type="password" name="password" class="form-control" placeholder="your password"/>
                    </div>
                    <a href="" class="forgot-password">Forgot password? </a>
                    <button type="submit" class="w-100 btn-default mt-20 fw-600" disabled>Login</button>
                </form>

                @if(Session::has('error-message'))
                    <p class="alert alert-danger" style="font-size:14px;"><i class="fas fa-exclamation-triangle mr-1"></i> {{ Session::get('error-message') }}</p>
                @endif
                <div class="text-center">
                    <a href="{{route('website.auth.signup')}}" class="btn-signup">I don't have an account yet <i class="ri-arrow-right-s-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Login section start here -->

@endsection