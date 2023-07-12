@extends('website.layouts.base')

@section('page-content')

<section class="upcoming-workshop">
    <div class="container">
        <div class="row mb-60 upcoming-workshop-header text-center text-lg-start">
            <div class="col-lg-8">
                <h2>Workshop</h2>
                <p>Alokito Teachers has been holding workshops since the very beginning. We have performed numerous workshops so far and have had many success stories to tell. We focus on a teacher's ability to empower students to become a better person and acheive success in their lives.</p>
            </div>
            <div class="col-lg-4">
                <a href="" class="btn btn-default btn-secondary px-3">
                    Request for a Workshop
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_1061_28121" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                            <rect width="16" height="16" fill="#D9D9D9"/>
                        </mask>
                        <g mask="url(#mask0_1061_28121)">
                            <path d="M8.00065 10.6668L10.6673 8.00016L8.00065 5.3335L7.06732 6.26683L8.13398 7.3335H5.33398V8.66683H8.13398L7.06732 9.7335L8.00065 10.6668ZM8.00065 14.6668C7.07843 14.6668 6.21176 14.4917 5.40065 14.1415C4.58954 13.7917 3.88398 13.3168 3.28398 12.7168C2.68398 12.1168 2.2091 11.4113 1.85932 10.6002C1.5091 9.78905 1.33398 8.92239 1.33398 8.00016C1.33398 7.07794 1.5091 6.21127 1.85932 5.40016C2.2091 4.58905 2.68398 3.8835 3.28398 3.2835C3.88398 2.6835 4.58954 2.20838 5.40065 1.85816C6.21176 1.50838 7.07843 1.3335 8.00065 1.3335C8.92287 1.3335 9.78954 1.50838 10.6007 1.85816C11.4118 2.20838 12.1173 2.6835 12.7173 3.2835C13.3173 3.8835 13.7922 4.58905 14.142 5.40016C14.4922 6.21127 14.6673 7.07794 14.6673 8.00016C14.6673 8.92239 14.4922 9.78905 14.142 10.6002C13.7922 11.4113 13.3173 12.1168 12.7173 12.7168C12.1173 13.3168 11.4118 13.7917 10.6007 14.1415C9.78954 14.4917 8.92287 14.6668 8.00065 14.6668ZM8.00065 13.3335C9.48954 13.3335 10.7507 12.8168 11.784 11.7835C12.8173 10.7502 13.334 9.48905 13.334 8.00016C13.334 6.51127 12.8173 5.25016 11.784 4.21683C10.7507 3.1835 9.48954 2.66683 8.00065 2.66683C6.51176 2.66683 5.25065 3.1835 4.21732 4.21683C3.18398 5.25016 2.66732 6.51127 2.66732 8.00016C2.66732 9.48905 3.18398 10.7502 4.21732 11.7835C5.25065 12.8168 6.51176 13.3335 8.00065 13.3335Z" fill="#F29C1F"/>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
        <h3 class="fw-400">Featured Workshop</h3>
        <div class="upcoming-workshop-item">
            <div class="upcoming-workshop-top">
                <span class="date">22 July, 2023</span>
                <span class="price">৳১২০০</span>
            </div>
            <ul class="workshop-ratting">
                <li><i class="ri-star-fill"></i></li>
                <li><i class="ri-star-fill"></i></li>
                <li><i class="ri-star-fill"></i></li>
                <li><i class="ri-star-fill"></i></li>
                <li><i class="ri-star-line"></i></li>
            </ul>
            <span class="author">by Alokito Teachers</span>
            <div class="uw-footer">
                <h3>Fun Ways to Teach: Subject Based Games to Make Learning Engaging and Joyful</h3>
                <a href="" class="btn-default">Register<i class="ri-arrow-right-s-line"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Course section start here -->
<section class="course-choose with-border">
    <div class="container">
        <div class="row align-items-center text-center text-lg-start">
            <div class="col-lg-6 mb-30 mb-lg-0">
                <img src="{{asset_url('website/assets/images/course-choose.png')}}" alt="course-choose">
            </div>
            <div class="col-lg-6">
                <div class="course-choose-content">
                    <h2 class="section-title fw-400">Confused about which course/workshop to take?</h2>
                    <p>Fill out this need assesment form. We will recommend you courses and workshops you can register into.</p>
                    <a href="" class="btn btn-default">Visit Link <i class="ri-arrow-right-s-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Course section end here -->

<!-- Mentorship section start here -->
<section class="workshop-section mentorship-section light-bg p-0">
    <div class="container">
        <div class="row align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-7 offset-md-1">
                <div class="workshop-content">
                    <h2 class="fw-400">Want to arrange workshop with Alokito Teachers?</h2>
                    <a href="" class="btn-default btn-secondary border-0 ps-0">Contact Here <i
                            class="ri-arrow-right-s-line"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <img src="{{asset_url('website/assets/images/workshop-page.png')}}" alt="workshop">
            </div>
        </div>
    </div>
</section>
<!-- Mentorship section end here -->

<!-- Workshops section start here -->
<section class="ready-workshop">
    <div class="container">
        <h3 class="fw-400 mb-40">Workshops</h3>
        <div class="row gx-5">
            <div class="col-lg-8">
                <div class="workshop-items">

                    @foreach($workshops as $workshop)
                    <div class="workshop-item">
                        <div class="workshop-thumb">
                            <img src="{{$workshop->getAbsoluteThumbnailPath()}}" style="border-radius:20px" alt="workshop">
                        </div>
                        <div class="workshop-content">
                            <div class="workshop-top">
                                <span class="date">Starts from - 22 July, 2023</span>
                                <ul class="workshop-ratting">
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-fill"></i></li>
                                    <li><i class="ri-star-line"></i></li>
                                </ul>
                            </div>
                            <span class="author">by Alokito Teachers</span>
                            <h6>{{$workshop->name}}</h6>
                            <div class="workshop-footer">
                                @if($workshop->sale_price)
                                    <span class="price">BDT {{$workshop->sale_price}}</span>
                                @else
                                    <span class="price">BDT {{$workshop->price}}</span>
                                @endif
                                <a href="{{route('website.workshops.batches', $workshop->id)}}" class="btn-default">Find Batch <i class="ri-arrow-right-s-line"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
            
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="workshop-sidebar ps-md-5">
                    <h6 class="fw-600">Your Workshops</h6>
                    <div class="attended-workshop">
                        <div class="progress">৮০%</div>
                        <div class="progress-content">
                            <h6 class="fw-600 mb-10">Fun ways to teach: Subject-based games to make learning engaging & joyful</h6>
                            <span class="date">22 Jul, 2022</span>
                        </div>
                    </div>
                    <div class="attended-workshop">
                        <div class="progress">৭০%</div>
                        <div class="progress-content">
                            <h6 class="fw-600 mb-10">Critical Question Formulation and Effective Feedback</h6>
                            <span class="date">22 Jul, 2022</span>
                        </div>
                    </div>
                    <div class="attended-workshop">
                        <div class="progress">৯৮%</div>
                        <div class="progress-content">
                            <h6 class="fw-600 mb-10">Classroom Management</h6>
                            <span class="date">22 Jul, 2022</span>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- Workshops section end here -->

@endsection
