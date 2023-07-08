@extends('website.layouts.base')

@section('page-content')

<!-- Banner section start here -->
<section class="home-banner">
    <div class="container">
        <div class="row align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-6">
                <img src="{{asset_url('website/assets/images/banner.png')}}" alt="banner">
            </div>
            <div class="col-lg-6">
                <div class="banner-content">
                    <h1>Start your Alokito journey today</h1>
                    <p>A teacher is the artisan of the next generation. We want to support, evaluate and empower them to make them skilled teachers of the 21st century.</p>
                    <a href="{{route('website.auth.signup')}}" class="btn btn-default">Join Alokito Teachers<i class="ri-arrow-right-s-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner section end here -->

<!-- Course section start here -->
<section class="course-section">
    <div class="container">
        <div class="course-section-inner">
            <h2 class="header-title">Our Courses</h2>
            <p class="header-desc">A teacher development platform that aims to support, nurture and empower teachers as compassionate leaders and lifelong learners.</p>

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
                                    <span>৪৫ জন কোর্সটি করছেন</span>
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
                                <a href="course-single.html" class="btn btn-default btn-secondary">বিস্তারিত দেখুন <i
                                        class="ri-arrow-right-s-line"></i></a>
                            </div>
                        </div>    
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <a href="courses.html" class="btn btn-default">All Courses <i class="ri-arrow-right-s-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Course section end here -->

<!-- Counter section start here -->
<section class="counter-section pb-5">
    <div class="container">
        <div class="row flex-column-reverse flex-md-row align-items-end">
            <div class="col-md-6">
                <img src="{{asset_url('website/assets/images/statistics.png')}}" alt="statistics">
            </div>
            <div class="col-md-5 offset-md-1">
                <div class="counter d-flex align-items-center">
                    <div class="counter-icon">
                        <img src="{{asset_url('website/assets/images/icons/school.png')}}" alt="graduation-icon">
                    </div>
                    <div class="counter-content">
                        <h1 class="counter-number">13,512</h1>
                        <p class="counter-title">Teachers Trained</p>
                    </div>
                </div>
                <div class="counter d-flex align-items-center">
                    <div class="counter-icon">
                        <img src="{{asset_url('website/assets/images/icons/published_with_changes.png')}}" alt="graduation-icon">
                    </div>
                    <div class="counter-content">
                        <h1 class="counter-number">405,660</h1>
                        <p class="counter-title">Changemakers Developed</p>
                    </div>
                </div>
                <div class="counter d-flex align-items-center">
                    <div class="counter-icon">
                        <img src="{{asset_url('website/assets/images/icons/diversity_3.png')}}" alt="graduation-icon">
                    </div>
                    <div class="counter-content">
                        <h1 class="counter-number">50+</h1>
                        <p class="counter-title">Workshops & Courses</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Counter section end here -->

<!-- Workshop section start here -->
<section class="workshop-section pb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="workshop-content">
                    <h2>Workshops</h2>
                    <p>Very soon Alokito Teachers is launchuing its brand new workshop programs, where you can find valuable insights and training for your a sustainable career.</p>
                    <!-- <a href="" class="btn-default">আরও দেখুন <i class="ri-arrow-right-s-line"></i></a> -->
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <img src="{{asset_url('website/assets/images/workshop.png')}}" alt="workshop">
            </div>
        </div>
    </div>
</section>
<!-- Workshop section end here -->

<!-- Worksheet section end here -->
<!-- <section class="worksheet-section">
    <div class="container">
        <div class="worksheet-section-inner">
            <div class="row align-items-center">
                <div class="col-lg-7 worksheet-left-content">
                    <img src="{{asset_url('website/assets/images/worksheet.png')}}" alt="worksheet">
                    <h2 class="title">লেসন প্ল্যান, ওয়ার্কশীটসহ <br> বিভিন্ন ধরনের শিক্ষা-উপকরণ</h2>
                    <p>রিসোর্সের ডিটেইলস। সংজ্ঞার চাইতে কীভাবে হেল্প করবে সেটা জানালেভালো। ফ্রিকোয়েন্টলী করা হয় এটা
                        জানানোও
                        ভালো। দুটি বাক্যের বেশি না। </p>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="worksheet-content">
                        <form action="" class="worksheet-form">
                            <div class="form-group">
                                <label for="class">শ্রেণি</label>
                                <select class="form-select" name="class" id="class">
                                    <option value="">শ্রেণি নির্বাচন করুন</option>
                                    <option value="">১ম শ্রেণি</option>
                                    <option value="">২য় শ্রেণি</option>
                                    <option value="">৩য় শ্রেণি</option>
                                    <option value="">৪র্থ শ্রেণি</option>
                                    <option value="">৫ম শ্রেণি</option>
                                    <option value="">৬ষ্ঠ শ্রেণি</option>
                                    <option value="">৭ম শ্রেণি</option>
                                    <option value="">৮ম শ্রেণি</option>
                                    <option value="">৯ম শ্রেণি</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subject">বিষয়</label>
                                <select class="form-select" name="subject" id="subject">
                                    <option value="">বিষয় নির্বাচন করুন</option>
                                    <option value="">বাংলা</option>
                                    <option value="">ইংরেজী</option>
                                    <option value="">গণিত</option>
                                    <option value="">সমাজ</option>
                                    <option value="">বিজ্ঞান</option>
                                    <option value="">ধর্মশিক্ষা</option>
                                    <option value="">চারু ও কারু শিক্ষা</option>
                                    <option value="">সাধারণ জ্ঞান</option>
                                    <option value="">ধর্ম ও নৈতিক শিক্ষা</option>
                                    <option value="">মানবিক শিক্ষা</option>
                                    <option value="">সাহিত্য</option>
                                    <option value="">গবেষণা</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="chapter">অধ্যায়</label>
                                <select class="form-select" name="chapter" id="chapter">
                                    <option value="">অধ্যায় নির্বাচন করুন</option>
                                    <option value="">১ম অধ্যায়</option>
                                    <option value="">২য় অধ্যায়</option>
                                    <option value="">৩য় অধ্যায়</option>
                                    <option value="">৪র্থ অধ্যায়</option>
                                    <option value="">৫ম অধ্যায়</option>
                                    <option value="">৬ষ্ঠ অধ্যায়</option>
                                    <option value="">৭ম অধ্যায়</option>
                                    <option value="">৮ম অধ্যায়</option>
                                    <option value="">৯ম অধ্যায়</option>
                                </select>
                            </div>
                            <div class="ic-btn-group">
                                <button type="submit" class="btn btn-default btn-secondary">
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <mask id="mask0_870_7754" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                              x="0" y="0" width="25" height="24">
                                            <rect x="0.5" width="24" height="24" fill="#D9D9D9"/>
                                        </mask>
                                        <g mask="url(#mask0_870_7754)">
                                            <path d="M9.9 16.5L12.5 13.9L15.1 16.5L16.5 15.1L13.9 12.5L16.5 9.9L15.1 8.5L12.5 11.1L9.9 8.5L8.5 9.9L11.1 12.5L8.5 15.1L9.9 16.5ZM7.5 21C6.95 21 6.47933 20.8043 6.088 20.413C5.696 20.021 5.5 19.55 5.5 19V6H4.5V4H9.5V3H15.5V4H20.5V6H19.5V19C19.5 19.55 19.3043 20.021 18.913 20.413C18.521 20.8043 18.05 21 17.5 21H7.5ZM17.5 6H7.5V19H17.5V6Z"
                                                  fill="#F29C1F"/>
                                        </g>
                                    </svg>
                                    মুছুন
                                </button>
                                <button type="reset" class="btn btn-default">
                                    খুঁজুন
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <mask id="mask0_870_11584" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                              x="0" y="0" width="24" height="24">
                                            <rect width="24" height="24" fill="#D9D9D9"/>
                                        </mask>
                                        <g mask="url(#mask0_870_11584)">
                                            <path d="M2 19V17.5H12V19H2ZM2 13.75V12.25H7V13.75H2ZM2 8.5V7H7V8.5H2ZM20.95 19L16.95 15C16.5167 15.3333 16.05 15.5833 15.55 15.75C15.05 15.9167 14.5333 16 14 16C12.6167 16 11.4375 15.5125 10.4625 14.5375C9.4875 13.5625 9 12.3833 9 11C9 9.61667 9.4875 8.4375 10.4625 7.4625C11.4375 6.4875 12.6167 6 14 6C15.3833 6 16.5625 6.4875 17.5375 7.4625C18.5125 8.4375 19 9.61667 19 11C19 11.5333 18.9167 12.05 18.75 12.55C18.5833 13.05 18.3333 13.5167 18 13.95L22 17.95L20.95 19ZM14 14.5C14.9667 14.5 15.7917 14.1583 16.475 13.475C17.1583 12.7917 17.5 11.9667 17.5 11C17.5 10.0333 17.1583 9.20833 16.475 8.525C15.7917 7.84167 14.9667 7.5 14 7.5C13.0333 7.5 12.2083 7.84167 11.525 8.525C10.8417 9.20833 10.5 10.0333 10.5 11C10.5 11.9667 10.8417 12.7917 11.525 13.475C12.2083 14.1583 13.0333 14.5 14 14.5Z"
                                                  fill="#532437"/>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Worksheet section end here -->

<!-- Why choose us section start here -->
<section class="why-choose-us">
    <div class="container d-flex justify-content-center">
        <div class="col-lg-10">
            <h2 class="section-title">Why would you join Alokito Teachers ?</h2>
            <p class="mb-40">We provide the opportunity to learn, earn and grow a teacher's career in here.</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="choose-card">
                        <img src="{{asset_url('website/assets/images/icons/school-2.png')}}" alt="choose-icon">
                        <h3>শিখুন</h3>
                        <p>শিক্ষকদের সুবিধার্থে আলোকিত টিচার্সে রয়েছে বিভিন্ন কোর্স, অনলাইন এবং ইন পার্সন ওয়ার্কশপ, আর
                            ক্লাসরুম রিসোর্স</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="choose-card">
                        <img src="{{asset_url('website/assets/images/icons/account_balance_wallet.png')}}" alt="choose-icon">
                        <h3>আয় করুন</h3>
                        <p>শিক্ষকরা তাদের ডেমো ক্লাসের ভিডিও, ওয়ার্কশীট, এবং লেসন প্ল্যান রিসোর্স হিসেবে বিক্রি করতে ও
                            কিনতে পারবেন এই প্ল্যাটফর্মে</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="choose-card">
                        <img src="{{asset_url('website/assets/images/icons/open_in_full.png')}}" alt="choose-icon">
                        <h3>বিকশিত হোন</h3>
                        <p>সবার জন্য ২১ শতকের শিক্ষা নিশ্চিত করতে একটি শিক্ষকসমাজ তৈরি করাই এই প্ল্যাটফর্মের
                            উদ্দেশ্য</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why choose us section end here -->

<!-- leader-board section start here -->
<!-- <section class="leader-board">
    <div class="container ">
        <h2 class="section-title d-flex align-items-center">Teacher Leaderboard <i class="ri-question-line"></i></h2>
        <p class="mb-40">The leaderboard consists of the cumulative average of scores earned in Courses, Workshops, Innovations, Resources and Mentorings Sessions.</p>
        <div class="leader-board-table">
            <div class="leader-board-table-header">
                <h3>Course Leaderboard</h3>
                <select name="" id="" class="form-select">
                    <option value="">Course Leaderboard</option>
                    <option value="">Workshop Leaderboard</option>
                    <option value="">Innovation Leaderboard</option>
                    <option value="">Overall Leaderboard</option>
                </select>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Score</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>০১</td>
                        <td class="student-info"><img src="{{asset_url('website/assets/images/leader-board/student-1.png')}}" alt="">মো. মহিউদ্দীন
                        </td>
                        <td>২২৯.০৯</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section> -->
<!-- leader-board section end here -->

<!-- Testimonial section start here -->
<section class="testimonial-section">
    <div class="container">
        <h2 class="section-title">Teacher's Comemnts</h2>
        <div class="testimonial-slider">
            <div class="testimonial-item">
                <p>জীবের মধ্যে সবচেয়ে সম্পূর্ণতা মানুষের। কিন্তু সবচেয়ে অসম্পূর্ণ হয়ে সে জন্মগ্রহণ করে। বাঘ ভালুক তার
                    জীবনযাত্রার পনেরো- আনা মূলধন নিয়ে আসে প্রকৃতি থেকে। জীবরঙ্গভূমিতে মানুষ এসে দেখা দেয় দুই শূন্য
                    হাতে মুঠো বেঁধে।</p>
                <div class="testimonial-footer">
                    <div class="avatar">
                        <img src="{{asset_url('website/assets/images/teacher.png')}}" alt="testimonial-avatar">
                    </div>
                    <div class="client-info">
                        <h4>টিচারের নাম</h4>
                        <p>স্কুলের নাম</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <p>জীবের মধ্যে সবচেয়ে সম্পূর্ণতা মানুষের। কিন্তু সবচেয়ে অসম্পূর্ণ হয়ে সে জন্মগ্রহণ করে। বাঘ ভালুক তার
                    জীবনযাত্রার পনেরো- আনা মূলধন নিয়ে আসে প্রকৃতি থেকে। জীবরঙ্গভূমিতে মানুষ এসে দেখা দেয় দুই শূন্য
                    হাতে মুঠো বেঁধে।</p>
                <div class="testimonial-footer">
                    <div class="avatar">
                        <img src="{{asset_url('website/assets/images/teacher.png')}}" alt="testimonial-avatar">
                    </div>
                    <div class="client-info">
                        <h4>টিচারের নাম</h4>
                        <p>স্কুলের নাম</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <p>জীবের মধ্যে সবচেয়ে সম্পূর্ণতা মানুষের। কিন্তু সবচেয়ে অসম্পূর্ণ হয়ে সে জন্মগ্রহণ করে। বাঘ ভালুক তার
                    জীবনযাত্রার পনেরো- আনা মূলধন নিয়ে আসে প্রকৃতি থেকে। জীবরঙ্গভূমিতে মানুষ এসে দেখা দেয় দুই শূন্য
                    হাতে মুঠো বেঁধে।</p>
                <div class="testimonial-footer">
                    <div class="avatar">
                        <img src="{{asset_url('website/assets/images/teacher.png')}}" alt="testimonial-avatar">
                    </div>
                    <div class="client-info">
                        <h4>টিচারের নাম</h4>
                        <p>স্কুলের নাম</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial section end here -->

<!-- Partner section start here -->
<section class="partner-section">
    <div class="container">
        <h2 class="section-title">Schools we work with</h2>
        <div class="partner-slider">
            <div class="partner-logo">
                <img src="{{asset_url('website/assets/images/partner/partner-1.png')}}" alt="partner">
            </div>
            <div class="partner-logo">
                <img src="{{asset_url('website/assets/images/partner/partner-2.png')}}" alt="partner">
            </div>
            <div class="partner-logo">
                <img src="{{asset_url('website/assets/images/partner/partner-3.png')}}" alt="partner">
            </div>
            <div class="partner-logo">
                <img src="{{asset_url('website/assets/images/partner/partner-2.png')}}" alt="partner">
            </div>
        </div>
    </div>
</section>
<!-- Partner section end here -->

<!-- Looking job section start here -->
<section class="workshop-section looking-job p-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="workshop-content">
                    <h2>Looking for jobs?</h2>
                    <p>Very Soon you can find your teaching jobs in Alokito Teachers platform. Your profile will work like a CV for institutions to offer you jobs. </p>
                    <!-- <a href="" class="btn-default">আরও দেখুন <i class="ri-arrow-right-s-line"></i></a> -->
                </div>
            </div>
            <div class="col-md-6 offset-md-1">
                <img src="{{asset_url('website/assets/images/looking-for-job.png')}}" alt="looking-for-job">
            </div>
        </div>
    </div>
</section>
<!-- Looking job section end here -->

<!-- Mentorship section start here -->
<!-- <section class="workshop-section mentorship-section p-0">
    <div class="container">
        <div class="row align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 offset-md-1">
                <img src="{{asset_url('website/assets/images/mentorship.png')}}" alt="mentorship">
            </div>
            <div class="col-md-5">
                <div class="workshop-content">
                    <h2>আলোকিত টিচার্সের নিয়ে এলো মেন্টরশিপ প্রোগ্রাম</h2>
                    <p>মেন্টরশিপ কী, কেন, কীভাবে এটার একটা ছোট বর্ণনা এবং নিচের বাটনে
                        ক্লিক করুন - এরকম একটা কথা</p>
                    <a href="" class="btn-default btn-white">যোগাযোগ করুন <i class="ri-arrow-right-s-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Mentorship section end here -->

<!-- Partner section start here -->
<section class="partner-section style-two">
    <div class="container">
        <h2 class="section-title">Our Partners</h2>
        <div class="partner-slider-2">
            <div class="partner-logo">
                <img src="{{asset_url('website/assets/images/partner/partner-4.png')}}" alt="partner">
            </div>
            <div class="partner-logo">
                <img src="{{asset_url('website/assets/images/partner/partner-5.png')}}" alt="partner">
            </div>
            <div class="partner-logo">
                <img src="{{asset_url('website/assets/images/partner/partner-6.png')}}" alt="partner">
            </div>
            <div class="partner-logo">
                <img src="{{asset_url('website/assets/images/partner/partner-7.png')}}" alt="partner">
            </div>
            <div class="partner-logo">
                <img src="{{asset_url('website/assets/images/partner/partner-6.png')}}" alt="partner">
            </div>
        </div>
    </div>
</section>
<!-- Partner section end here -->
@endsection


