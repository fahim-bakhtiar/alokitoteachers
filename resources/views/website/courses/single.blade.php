@extends('website.layouts.base')

@section('page-content')

<section class="course-intro-section">
    <div class="container">

        <!-- <div class="row">
            <div class="col-12">
                <div class="alert alert-danger" role="alert">A simple danger alert—check it out!</div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-lg-8">
                <div class="course-intro-content">
                    <h2 class="title text-center text-lg-start">{{$course->title}}</h2>

                    
                    <div class="iframe-container mb-4">
                        <iframe class="responsive-iframe" src="{{$course->preview_video}}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    </div>


                    <ul class="nav nav-pills mb-3 course-tab" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-about" type="button" role="tab" aria-controls="pills-about"
                                    aria-selected="true">About Course
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Learning Objective
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Course Advisor
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Course Designer
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-disabled" type="button" role="tab"
                                    aria-controls="pills-disabled" aria-selected="false">Course Facilitator
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="course-tabContent">
                        <div class="tab-pane fade show active" id="pills-about" role="tabpanel"
                             aria-labelledby="pills-about-tab" tabindex="0">
                            <div class="row course-single-tab-info-row" style="background-color: #fff;">
                                <div class="col-12">
                                    {!! $course->details !!}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade course-info" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab" tabindex="0">
                             <div class="row course-single-tab-info-row" style="background-color: #fff;">
                                <div class="col-12">
                                    {!! $course->learning_objective !!}
                                </div>
                             </div>
                             
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                             aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="row course-single-tab-info-row">
                                @foreach($course->advisors() as $advisor)
                                <div class="col-md-6">
                                    <div class="course-teacher mb-30 mb-0">
                                        <div class="course-teacher-top">
                                            <div class="avatar">
                                                <img style="max-width:100px" src="{{$advisor->getAbsoluteProfileImagePath()}}" alt="course-teacher-avatar">
                                            </div>
                                            <div class="course-teacher-info">
                                                <h4>{{$advisor->fullname()}}</h4>
                                                <p>Advisor</p>
                                            </div>
                                        </div>
                                        <p>{!! $advisor->details !!}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                             aria-labelledby="pills-contact-tab" tabindex="0">
                            <div class="row course-single-tab-info-row">
                                @foreach($course->designers() as $designer)
                                <div class="col-md-6">
                                    <div class="course-teacher mb-30 mb-0">
                                        <div class="course-teacher-top">
                                            <div class="avatar">
                                                <img style="max-width:100px" src="{{$designer->getAbsoluteProfileImagePath()}}" alt="course-teacher-avatar">
                                            </div>
                                            <div class="course-teacher-info">
                                                <h4>{{$designer->fullname()}}</h4>
                                                <p>Course Designer</p>
                                            </div>
                                        </div>
                                        <p>{!! $designer->details !!}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-disabled" role="tabpanel"
                             aria-labelledby="pills-disabled-tab" tabindex="0">
                            <div class="row course-single-tab-info-row">
                                @foreach($course->facilitators() as $facilitator)
                                <div class="col-md-6">
                                    <div class="course-teacher mb-30 mb-0">
                                        <div class="course-teacher-top">
                                            <div class="avatar">
                                                <img style="max-width:100px" src="{{$facilitator->getAbsoluteProfileImagePath()}}" alt="course-teacher-avatar">
                                            </div>
                                            <div class="course-teacher-info">
                                                <h4>{{$facilitator->fullname()}}</h4>
                                                <p>Facilitator</p>
                                            </div>
                                        </div>
                                        <p>{!! $facilitator->details !!}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                @if($logged_in_teacher->id == 0)
                    <div class="course-contents d-block">
                        <div class="course-content-top">
                            <h3>Course Summery</h3>
                            <ul class="course-specification">
                                <li><img src="{{asset_url('website/assets/images/icons/bookmarks.svg')}}" alt="">{{$course->no_of_chapters()}} Chapters</li>
                                <li><img src="{{asset_url('website/assets/images/icons/psychology.svg')}}" alt="">{{count($course->quizzes)}} Quizes</li>
                                <li><img src="{{asset_url('website/assets/images/icons/peoples.svg')}}" alt="">১০ জন সম্পন্ন করেছে কোর্সটি</li>
                                <!-- <li><img src="{{asset_url('website/assets/images/icons/timer.svg')}}" alt="">মেয়াদ/সময়</li> -->
                            </ul>
                        </div>
                        <div class="course-content-footer">
                            <h3 class="course-price">BDT {{$course->price}}</h3>
                            <a href="{{route('website.auth.teacher.signin')}}" class="btn btn-default btn-150">Login to Buy</a>
                        </div>
                    </div>
                @endif

                @if(
                    $logged_in_teacher->id != 0 && 
                    $logged_in_teacher->current_subscription()->remaining_courses > 0 && 
                    !$progress
                )
                    <div class="course-contents">
                        <div class="course-content-top">
                            <div class="text-left mb-4">
                                <span>You have <strong>{{$logged_in_teacher->current_subscription()->remaining_courses}} Courses</strong>  to unlock in your current subscription</span>
                            </div>
                            <h3>Course Summery</h3>
                            <ul class="course-specification">
                                <li><img src="{{asset_url('website/assets/images/icons/bookmarks.svg')}}" alt="">{{$course->no_of_chapters()}} Chapters</li>
                                <li><img src="{{asset_url('website/assets/images/icons/psychology.svg')}}" alt="">{{count($course->quizzes)}} Quizes</li>
                                <li><img src="{{asset_url('website/assets/images/icons/peoples.svg')}}" alt="">১০ জন সম্পন্ন করেছে কোর্সটি</li>
                            </ul>
                        </div>
                        <div class="course-content-footer">
                            <h3 class="course-price">BDT {{$course->price}}</h3>
                            <a href="" class="btn btn-default btn-secondary btn-icon-left btn-150" onclick="event.preventDefault();document.getElementById('unlock-form').submit();">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_976_24642)">
                                        <path d="M12.5 17.5C13.6 17.5 14.5 16.6 14.5 15.5C14.5 14.4 13.6 13.5 12.5 13.5C11.4 13.5 10.5 14.4 10.5 15.5C10.5 16.6 11.4 17.5 12.5 17.5ZM18.5 8.5H17.5V6.5C17.5 3.74 15.26 1.5 12.5 1.5C9.74 1.5 7.5 3.74 7.5 6.5H9.4C9.4 4.79 10.79 3.4 12.5 3.4C14.21 3.4 15.6 4.79 15.6 6.5V8.5H6.5C5.4 8.5 4.5 9.4 4.5 10.5V20.5C4.5 21.6 5.4 22.5 6.5 22.5H18.5C19.6 22.5 20.5 21.6 20.5 20.5V10.5C20.5 9.4 19.6 8.5 18.5 8.5ZM18.5 20.5H6.5V10.5H18.5V20.5Z"
                                            fill="#F29C1F"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_976_24642">
                                            <rect width="24" height="24" fill="white" transform="translate(0.5 0.5)"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                Unlock Course
                            </a>
                            
                            <form id="unlock-form" action="{{route('course.teacher.unlock', ['teacherID' => $logged_in_teacher->id, 'courseID' => $course->id])}}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    </div>
                @endif

                @if(
                    $logged_in_teacher->id != 0 && 
                    $logged_in_teacher->current_subscription()->remaining_courses == 0 && 
                    !$progress
                )
                    <div class="course-contents">
                        <div class="course-content-top">
                            <div class="text-left mb-4">
                                <span>You have exhausted the limit to unlock courses in your current subscription. <strong> <a href="{{route('website.packages.all')}}" target="blank">Upgrade/Renew</a> </strong> your current plan or <strong> pay <strong> BDT {{$course->price}}</strong> to access the course right away!</span>

                                <hr>
                            </div>
                            <h3>Course Summery</h3>
                            <ul class="course-specification">
                                <li><img src="{{asset_url('website/assets/images/icons/bookmarks.svg')}}" alt="">{{$course->no_of_chapters()}} Chapters</li>
                                <li><img src="{{asset_url('website/assets/images/icons/psychology.svg')}}" alt="">{{count($course->quizzes)}} Quizes</li>
                                <li><img src="{{asset_url('website/assets/images/icons/peoples.svg')}}" alt="">১০ জন সম্পন্ন করেছে কোর্সটি</li>
                            </ul>
                        </div>
                        <div class="course-content-footer">
                            <h3 class="course-price">BDT {{$course->price}}</h3>
                            <a href="" class="btn btn-default btn-secondary btn-icon-left btn-150" onclick="event.preventDefault();document.getElementById('purchase-form').submit();">
                                Purchase Course
                            </a>
                            
                            <form id="purchase-form" action="{{route('course.teacher.purchase', ['teacherID' => $logged_in_teacher->id, 'courseID' => $course->id])}}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    </div>
                @endif

                @if(
                    $logged_in_teacher->id != 0 && 
                    $logged_in_teacher->current_subscription()->remaining_courses == -1 && 
                    !$progress
                )
                    <div class="course-contents">
                        <div class="course-content-top">
                            <div class="text-left mb-4">
                                <span>Subscribe into a <strong> <a href="{{route('website.packages.all')}}" target="blank">Plan</a> </strong> to get a Better Deal.</span>
                                <hr>
                            </div>
                            <h3>Course Summery</h3>
                            <ul class="course-specification">
                                <li><img src="{{asset_url('website/assets/images/icons/bookmarks.svg')}}" alt="">{{$course->no_of_chapters()}} Chapters</li>
                                <li><img src="{{asset_url('website/assets/images/icons/psychology.svg')}}" alt="">{{count($course->quizzes)}} Quizes</li>
                                <li><img src="{{asset_url('website/assets/images/icons/peoples.svg')}}" alt="">১০ জন সম্পন্ন করেছে কোর্সটি</li>
                            </ul>
                        </div>
                        <div class="course-content-footer">
                            <h3 class="course-price">BDT {{$course->price}}</h3>
                            <a href="" class="btn btn-default btn-secondary btn-icon-left btn-150" onclick="event.preventDefault();document.getElementById('purchase-form').submit();">
                                Purchase Course
                            </a>
                            
                            <form id="purchase-form" action="{{route('course.teacher.purchase', ['teacherID' => $logged_in_teacher->id, 'courseID' => $course->id])}}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    </div>
                @endif

                @if($logged_in_teacher->id != 0 && $progress)
                    <div class="course-contents">
                        <div class="course-content-top">
                            <div class="text-center">
                                <div class="course-progress">{{$progress->get_current_progress()}} %</div>
                            </div>
                            <h3>Course Summery</h3>
                            <ul class="course-specification">
                                <li><img src="{{asset_url('website/assets/images/icons/bookmarks.svg')}}" alt="">{{$course->no_of_chapters()}} Chapters</li>
                                <li><img src="{{asset_url('website/assets/images/icons/psychology.svg')}}" alt="">{{count($course->quizzes)}} Quizes</li>
                                <li><img src="{{asset_url('website/assets/images/icons/peoples.svg')}}" alt="">১০ জন সম্পন্ন করেছে কোর্সটি</li>
                            </ul>
                        </div>
                        
                        <div class="course-content-footer">
                            
                                <a href="{{route('course.teacher.load_course_content', ['courseID' => $course->id, 'desired_sequence' => ($progress->get_next_sequence())])}}" class="btn btn-default w-100">
                                    @if($progress->get_current_sequence() == 0)
                                        Get Started
                                    @else
                                        Continue Course
                                    @endif
                                </a>
                            
                        </div>
                    </div>
                @endif

                <div class="course-contents d-none">
                    <div class="course-content-top">
                        <div class="text-center">
                            <div class="course-progress complete">১০০%</div>
                        </div>
                        <h3>কোর্সের কন্টেন্টসমূহ</h3>
                        <ul class="course-specification">
                            <li><img src="{{asset_url('website/assets/images/icons/bookmarks.svg')}}" alt="">১১টি অধ্যায়</li>
                            <li><img src="{{asset_url('website/assets/images/icons/psychology.svg')}}" alt="">১৫টি কুইজ</li>
                            <li><img src="{{asset_url('website/assets/images/icons/peoples.svg')}}" alt="">১০ জন সম্পন্ন করেছে কোর্সটি</li>
                            <li><img src="{{asset_url('website/assets/images/icons/timer.svg')}}" alt="">মেয়াদ/সময়</li>
                        </ul>
                    </div>
                    <div class="course-content-footer">
                        <a href="" class="btn btn-default w-100">সার্টিফিকেট</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Course intro section end here -->

@endsection