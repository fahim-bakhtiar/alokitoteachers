@extends('website.layouts.base')

@section('page-content')

<!-- Course section start here -->
<section class="course-section course-section-two">
    <div class="container">
        <div class="course-section-inner overflow-hidden">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="header-title text-center text-md-start">Our Courses</h2>
                    <p class="header-desc text-center text-md-start">If you are not sure about which course to start from, you can take an assesment which takes 5 minutes. And we will recommend courses for you.</p>
                </div>
                <div class="col-md-3 offset-md-3 mb-4 mb-md-0">
                    <!-- <div class="course-search-input">
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="ri-search-line"></i></span>
                            <input type="text" name="course-search" class="form-control border-start-0 ps-0" placeholder="কোর্স খুঁজুন"/>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="col-12 text-center text-md-start">
                    <h3 class="fw-400 mb-40">Featured Courses</h3>
                </div> -->
            </div>
            <div class="course-items">
                <div class="row">
                    @foreach($courses as $course)
                    <div class="col-lg-4">
                        <div class="course-item">
                            <div class="course-thumb">
                                <a href="{{route('website.courses.single', $course->id)}}"><img class="course-image" src="{{$course->getAbsoluteProfileImagePath()}}" alt="course"></a>
                                <div class="course-logo">
                                    <img src="{{asset_url('website/assets/images/logo.png')}}" alt="course-logo">
                                </div>
                                <div class="course-enrol">
                                    <img src="{{asset_url('website/assets/images/icons/green-circle-check.svg')}}" alt="course-enrol">
                                </div>
                            </div>
                            <div class="course-content">
                                <span class="no-of-lessons">{{$course->no_of_chapters()}} Chapters</span>
                                <a href="{{route('website.courses.single', $course->id)}}" class="course-name">{{$course->title}}</a>
                                <!-- <div class="course-student">
                                    <ul>
                                        <li><img src="{{asset_url('website/assets/images/student-1.png')}}" alt="student-thumb"></li>
                                        <li><img src="{{asset_url('website/assets/images/student-2.png')}}" alt="student-thumb"></li>
                                        <li><img src="{{asset_url('website/assets/images/student-3.png')}}" alt="student-thumb"></li>
                                    </ul>
                                    <span>45 People are doing this course</span>
                                </div> -->
                                <div class="course-meta">
                                    <div class="course-meta-left">
                                        <ul class="course-ratting">
                                            <li><i class="ri-star-fill"></i></li>
                                            <li><i class="ri-star-fill"></i></li>
                                            <li><i class="ri-star-fill"></i></li>
                                            <li><i class="ri-star-fill"></i></li>
                                            <li><i class="ri-star-line"></i></li>
                                        </ul>
                                        <!-- <div class="course-total-student">
                                            <img src="{{asset_url('website/assets/images/icons/people.svg')}}" alt="user-icon">
                                            <span>৪৮</span>
                                        </div> -->
                                    </div>
                                    <div class="course-meta-right">
                                        @if($course->sale_price != null)
                                            <span class="course-price">
                                                BDT {{$course->sale_price}} 
                                                <span style="text-decoration: line-through;color:red;font-style:italic">{{$course->price}}</span> 
                                            </span>
                                        @else
                                            <span class="course-price">BDT {{$course->price}}</span>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{route('website.courses.single', $course->id)}}" class="btn btn-default btn-secondary">See Details <i
                                        class="ri-arrow-right-s-line"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Course section end here -->

<!-- Course section start here -->
<!-- <section class="course-choose pb-60 pb-md-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <img src="{{asset_url('website/assets/images/course-choose.png')}}" alt="course-choose">
            </div>
            <div class="col-lg-6">
                <div class="course-choose-content text-center text-lg-start">
                    <h2 class="section-title fw-400">বুঝতে পারছেন না কোন কোর্স/ ওয়ার্কশপটি আপনার জন্য?</h2>
                    <p>এটা নীড অ্যাসেসমেন্টের প্রম্পট। এখানে একটা ব্যাখ্যার মত যাবে। এগুলো
                        প্লেসহোল্ডার টেক্সট। চূড়ান্ত ডিজাইনে এ জায়গায় আসল টেক্সট বসবে</p>
                    <a href="" class="btn btn-default">যাচাই করুন <i class="ri-arrow-right-s-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Course section end here -->


<!-- Course section end here -->

@endsection
