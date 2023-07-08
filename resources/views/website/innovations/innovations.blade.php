@extends('website.layouts.base')

@section('page-content')

<!-- Innovations banner section start here -->
<section class="innovation-banner">
    <div class="container">
        <div class="row align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-4 text-center text-lg-start mt-40 mt-lg-0">
                <img src="{{asset_url('website/assets/images/innovations.png')}}" alt="innovations">
            </div>
            <div class="col-lg-8 text-center text-lg-start mt-40 mt-lg-0">
                <h2 class="mb-2">উদ্ভাবন</h2>
                <p>ইনোভেশনের ডেফিনেশন থাকবে, এ সম্পর্কে দুটি বাক্য থাকলে ভালো হয়। এটি একটি ডামি টেক্সট। ইনোভেশনের
                    ডেফিনেশন থাকবে, এ সম্পর্কে দুটি বাক্য থাকলে ভালো হয়। এটি একটি ডামি টেক্সট। </p>
                <div class="innovation-count mt-40">
                    <p class="fw-600">ইনোভেশন জমা দেওয়ার আর বাকি</p>
                    <ul id="countdown">
                        <li><span id="days">246</span>দিন</li>
                        <li><span id="hours">80</span>ঘন্টা</li>
                        <li><span id="minutes">40</span>মিনিট</li>
                    </ul>
                    <a href="" class="btn btn-default btn-secondary">আপনার ইনোভেশন জমা দিন <i
                            class="ri-arrow-right-s-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Innovations banner section end here -->

<!-- Best Innovations section start here -->
<section class="best-innovations">
    <div class="container">
        <div class="best-innovations-inner">
            <h3 class="fw-400 mb-10">এ বছরের শ্রেষ্ঠ উদ্ভাবন</h3>
            <p class="fw-600 mb-40 helper-text-ash">প্রথম ৩টি শীর্ষ উদ্ভাবন ছাড়াও বাকিগুলো দেখতে ‘আরও দেখুন’ বাটনটি
                চাপুন</p>

            <div class="row">
                <div class="col-lg-4">
                    <div class="innovation-item mb-30 mb-lg-0">
                        <div class="innovation-thumb">
                            <img src="{{asset_url('website/assets/images/innovation-1.png')}}" class="innovation-image" alt="innovation">
                        </div>
                        <a href="" class="innovation-teacher">
                            <div class="avatar">
                                <img src="{{asset_url('website/assets/images/inno-teacher.png')}}" alt="avatar">
                            </div>
                            <span>টিচার ইউজার</span>
                        </a>
                        <p class="fw-600">বাস্তব উপকরণ ব্যবহার করি, শিখন হবে তাড়াতাড়ি। বাস্তব উপকরণ ব্যবহার করি, শিখন
                            হবে তাড়াতাড়ি। </p>
                        <div class="innovation-footer">
                            <span class="date">08 Feb, 2022</span>
                            <ul class="innovation-ratting">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-line"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="innovation-item mb-30 mb-lg-0">
                        <div class="innovation-thumb">
                            <img src="{{asset_url('website/assets/images/innovation-1.png')}}" class="innovation-image" alt="innovation">
                        </div>
                        <a href="" class="innovation-teacher">
                            <div class="avatar">
                                <img src="{{asset_url('website/assets/images/inno-teacher.png')}}" alt="avatar">
                            </div>
                            <span>টিচার ইউজার</span>
                        </a>
                        <p class="fw-600">বাস্তব উপকরণ ব্যবহার করি, শিখন হবে তাড়াতাড়ি। বাস্তব উপকরণ ব্যবহার করি, শিখন
                            হবে তাড়াতাড়ি। </p>
                        <div class="innovation-footer">
                            <span class="date">08 Feb, 2022</span>
                            <ul class="innovation-ratting">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-line"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="innovation-item mb-30 mb-lg-0">
                        <div class="innovation-thumb">
                            <img src="{{asset_url('website/assets/images/innovation-1.png')}}" class="innovation-image" alt="innovation">
                        </div>
                        <a href="" class="innovation-teacher">
                            <div class="avatar">
                                <img src="{{asset_url('website/assets/images/inno-teacher.png')}}" alt="avatar">
                            </div>
                            <span>টিচার ইউজার</span>
                        </a>
                        <p class="fw-600">বাস্তব উপকরণ ব্যবহার করি, শিখন হবে তাড়াতাড়ি। বাস্তব উপকরণ ব্যবহার করি, শিখন
                            হবে তাড়াতাড়ি। </p>
                        <div class="innovation-footer">
                            <span class="date">08 Feb, 2022</span>
                            <ul class="innovation-ratting">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-line"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-40">
                <a href="" class="btn-default">আরও দেখুন <i class="ri-arrow-right-s-line"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- Best Innovations section end here -->

<!-- Year Best Innovations section start here -->
<section class="year-best-innovations">
    <div class="container">
        <div class="row ">
            <h3 class="fw-400 mb-0">বিগত বছরগুলোর শ্রেষ্ঠ উদ্ভাবন</h3>
            <p class="fw-600 helper-text-ash">২০XX এর শীর্ষ ১০টি উদ্ভাবন</p>
            <div class="col-lg-8">
                <div class="innovation-item">
                    <div class="row align-items-center flex-column-reverse flex-lg-row">
                        <div class="col-lg-8">
                            <div class="innovation-top">
                                <a href="" class="innovation-teacher">
                                    <div class="avatar">
                                        <img src="{{asset_url('website/assets/images/inno-teacher.png')}}" alt="avatar">
                                    </div>
                                    <span>টিচার ইউজার</span>
                                </a>
                                <span class="inno-award">১ম পুরস্কার</span>
                            </div>
                            <p class="fw-600 inno-name">বাস্তব উপকরণ ব্যবহার করি, শিখন হবে তাড়াতাড়ি। বাস্তব উপকরণ ব্যবহার করি,
                                শিখন হবে তাড়াতাড়ি। </p>
                            <div class="innovation-footer">
                                <span class="date">08 Feb, 2022</span>
                                <div class="innovation-footer-right">
                                    <ul class="innovation-ratting">
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-line"></i></li>
                                    </ul>
                                    <div class="course-total-student">
                                        <img src="{{asset_url('website/assets/images/icons/people.svg')}}" alt="user-icon">
                                        <span>৪৮</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-30 mb-lg-0">
                            <div class="innovation-thumb">
                                <img src="{{asset_url('website/assets/images/innovation-2.png')}}" class="innovation-image" alt="innovation">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="innovation-item">
                    <div class="row align-items-center flex-column-reverse flex-lg-row">
                        <div class="col-lg-8">
                            <div class="innovation-top">
                                <a href="" class="innovation-teacher">
                                    <div class="avatar">
                                        <img src="{{asset_url('website/assets/images/inno-teacher.png')}}" alt="avatar">
                                    </div>
                                    <span>টিচার ইউজার</span>
                                </a>
                                <span class="inno-award">১ম পুরস্কার</span>
                            </div>
                            <p class="fw-600 inno-name">বাস্তব উপকরণ ব্যবহার করি, শিখন হবে তাড়াতাড়ি। বাস্তব উপকরণ ব্যবহার করি,
                                শিখন হবে তাড়াতাড়ি। </p>
                            <div class="innovation-footer">
                                <span class="date">08 Feb, 2022</span>
                                <div class="innovation-footer-right">
                                    <ul class="innovation-ratting">
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-line"></i></li>
                                    </ul>
                                    <div class="course-total-student">
                                        <img src="{{asset_url('website/assets/images/icons/people.svg')}}" alt="user-icon">
                                        <span>৪৮</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-30 mb-lg-0">
                            <div class="innovation-thumb">
                                <img src="{{asset_url('website/assets/images/innovation-2.png')}}" class="innovation-image" alt="innovation">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="innovation-item">
                    <div class="row align-items-center flex-column-reverse flex-lg-row">
                        <div class="col-lg-8">
                            <div class="innovation-top">
                                <a href="" class="innovation-teacher">
                                    <div class="avatar">
                                        <img src="{{asset_url('website/assets/images/inno-teacher.png')}}" alt="avatar">
                                    </div>
                                    <span>টিচার ইউজার</span>
                                </a>
                                <span class="inno-award">১ম পুরস্কার</span>
                            </div>
                            <p class="fw-600 inno-name">বাস্তব উপকরণ ব্যবহার করি, শিখন হবে তাড়াতাড়ি। বাস্তব উপকরণ ব্যবহার করি,
                                শিখন হবে তাড়াতাড়ি। </p>
                            <div class="innovation-footer">
                                <span class="date">08 Feb, 2022</span>
                                <div class="innovation-footer-right">
                                    <ul class="innovation-ratting">
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-line"></i></li>
                                    </ul>
                                    <div class="course-total-student">
                                        <img src="{{asset_url('website/assets/images/icons/people.svg')}}" alt="user-icon">
                                        <span>৪৮</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-30 mb-lg-0">
                            <div class="innovation-thumb">
                                <img src="{{asset_url('website/assets/images/innovation-2.png')}}" class="innovation-image" alt="innovation">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="innovation-item">
                    <div class="row align-items-center flex-column-reverse flex-lg-row">
                        <div class="col-lg-8">
                            <div class="innovation-top">
                                <a href="" class="innovation-teacher">
                                    <div class="avatar">
                                        <img src="{{asset_url('website/assets/images/inno-teacher.png')}}" alt="avatar">
                                    </div>
                                    <span>টিচার ইউজার</span>
                                </a>
                                <span class="inno-award">১ম পুরস্কার</span>
                            </div>
                            <p class="fw-600 inno-name">বাস্তব উপকরণ ব্যবহার করি, শিখন হবে তাড়াতাড়ি। বাস্তব উপকরণ ব্যবহার করি,
                                শিখন হবে তাড়াতাড়ি। </p>
                            <div class="innovation-footer">
                                <span class="date">08 Feb, 2022</span>
                                <div class="innovation-footer-right">
                                    <ul class="innovation-ratting">
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-fill"></i></li>
                                        <li><i class="ri-star-line"></i></li>
                                    </ul>
                                    <div class="course-total-student">
                                        <img src="{{asset_url('website/assets/images/icons/people.svg')}}" alt="user-icon">
                                        <span>৪৮</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-30 mb-lg-0">
                            <div class="innovation-thumb">
                                <img src="{{asset_url('website/assets/images/innovation-2.png')}}" class="innovation-image" alt="innovation">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="innovation-sidebar">
                    <h6 class="fw-600">বছরভিত্তিক ইনোভেশন</h6>
                    <ul class="inno-year">
                        <li><a href="">২০২১</a></li>
                        <li><a href="">২০২০</a></li>
                        <li><a href="">২০১৯</a></li>
                        <li><a href="">২০১৮</a></li>
                        <li><a href="">২০১৭</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Year Best Innovations section end here -->

@endsection
