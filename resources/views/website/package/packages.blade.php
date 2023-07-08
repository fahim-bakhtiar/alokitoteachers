@extends('website.layouts.base')

@section('page-content')

<!-- Subscription section start here -->
<section class="subscription-section">

    <!-- <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-success" role="alert">A simple success alert—check it out!</div>
            </div>
        </div>
    </div> -->

    <div class="container">
        <h2 class="text-center text-lg-start">Subscription Plans</h2>
        <p class="text-center text-lg-start">Get everything we have to offer at a steady, affordable price. Subscribe into a package and you choose what you need.</p>
        <div class="row mb-60">

            @foreach($packages as $package)
            <div class="col-md-6">
                <div class="package-item text-center text-lg-start mb-3" @if(get_current_teacher()) @if(get_current_teacher()->current_package()->id == $package->id) style="border: 3px solid #1dc402" @endif @endif>
                    <div class="title">{{$package->title}}</div>
                    <div class="package-price">
                        <div>
                            <h1 class="mb-3">৳ {{$package->price}} ({{$package->duration}} Month)</h1>
                            <span>Pay {{$package->price}} BDT, in every {{$package->duration}} Months</span>
                        </div>
                        
                        @if(get_current_teacher())
                            @if(get_current_teacher()->current_package()->id == $package->id)
                                <a href="" class="btn-default btn-alternative" onclick="event.preventDefault();document.getElementById('renew-form').submit();">Renew</a>
                                <form id="renew-form" action="{{route('teacher.package.subscribe')}}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{$package->id}}">
                                </form>
                            @elseif(get_current_teacher()->current_package()->id == 0)
                                <a href="" class="btn-default" onclick="event.preventDefault();document.getElementById('subscribe-form').submit();">Subscribe</a>
                                <form id="subscribe-form" action="{{route('teacher.package.subscribe')}}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{$package->id}}">
                                </form>
                            @elseif(get_current_teacher()->current_package()->price > $package->price)
                                <a href="" class="btn-default" onclick="event.preventDefault();document.getElementById('downgrade-form').submit();">Get Plan</a>
                                <form id="downgrade-form" action="{{route('teacher.package.subscribe')}}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{$package->id}}">
                                </form>
                            @else
                                <a href="" class="btn-default" onclick="event.preventDefault();document.getElementById('upgrade-form').submit();">Upgrade</a>
                                <form id="upgrade-form" action="{{route('teacher.package.subscribe')}}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{$package->id}}">
                                </form>
                            @endif
                        @else
                            <a href="{{route('website.auth.signup')}}" class="btn-default">Subscribe</a>
                        @endif
                    </div>
                    <span class="specification-header">You will get :</span>
                    <ul>
                        <!-- <li><i class="ri-check-line"></i>{{$package->max_resource}} Resources</li> -->
                        <li><i class="ri-check-line"></i>{{$package->max_course}} Courses</li>
                        <!-- <li><i class="ri-check-line"></i>{{$package->max_workshop}} Workshops</li> -->
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row align-items-center flex-column-reverse flex-lg-row juc">
                    <div class="col-md-8">
                        <h2 class="fw-400">Or, Pay only what you need</h2>
                        <p>You don't have to pay for any plan. Having an account is enough. <strong>Just buy what you need.</strong></p>
                        <a href="" class="btn btn-default btn-150">Courses <i class="ri-arrow-right-s-line"></i></a>
                        <!-- <a href="" class="btn btn-default btn-150">Workshops <i class="ri-arrow-right-s-line"></i></a> -->
                        <!-- <a href="" class="btn btn-default btn-150">Resources <i class="ri-arrow-right-s-line"></i></a> -->
                    </div>
                    <div class="col-md-4 text-center text-lg-start">
                        <img src="{{asset_url('website/assets/images/coin.png')}}" alt="subscription">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Subscription section start here -->

@endsection
