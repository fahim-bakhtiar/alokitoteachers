@extends('website.layouts.base')

@section('page-content')

<!-- Course single section start here -->
<section class="course-single">
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <h4>Your Progress</h4>
                <div class="progress" style="height: 20px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$progress->get_current_progress()}}%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">{{$progress->get_current_progress()}}%</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-4">
                <div class="course-lesions course-left-card">
                    <h4>Course Content</h4>
                    <!-- <img src="{{asset_url('website/assets/images/icons/green-circle-check.svg')}}" alt="green-circle"> -->
                    <!-- <img src="{{asset_url('website/assets/images/icons/play_circle.svg')}}" alt="green-circle"> -->
                    <!-- <img src="{{asset_url('website/assets/images/icons/quiz.svg')}}" alt="green-circle"> -->
                    <!-- <img src="{{asset_url('website/assets/images/icons/library_books.svg')}}" alt="green-circle"> -->
                    <ul>
                        @foreach($course_sequence as $key => $item)
                        <li>
                            <a href="{{route('course.teacher.load_course_content', ['courseID' => $course->id, 'desired_sequence' => $key])}}" @if($key ==  $desired_sequence) style="color:green;" @endif
                            @if($key >  $progress->get_next_sequence()) style="color:gray;" @endif>
                                @if($item instanceof \App\Models\CourseVideo)
                                    <img src="{{asset_url('website/assets/images/icons/play_circle.svg')}}" alt="green-circle">
                                @else
                                    <img src="{{asset_url('website/assets/images/icons/quiz.svg')}}" alt="green-circle">
                                @endif

                                {{$item->title}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- <div class="course-left-card">
                    <h4>পাঠ্য বিষয়গুলো উপস্থাপন</h4>
                </div>
                <div class="course-left-card">
                    <h4>পাঠ্য বিষয়গুলো উপস্থাপনের প্রয়োজনীয়তা</h4>
                </div> -->
            </div>
            
            <div class="col-lg-7 offset-lg-1">
                <div class="course-nav d-flex justify-content-between">

                    <div class="course_page_progress_box">

                        <p class="d-block mb-3">Your Score: <strong>{{$progress->get_total_marks()}}</strong> </p>
                        
                    </div>
                    
                    <div class="course_page_next_box text-end">
                        <a href="{{route('course.teacher.load_course_content', ['courseID' => $course->id, 'desired_sequence' => ($desired_sequence+1)])}}" class="btn-default btn-secondary btn-150">
                            Next
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_976_5033" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                    width="16" height="16">
                                    <rect width="16" height="16" fill="#D9D9D9"/>
                                </mask>
                                <g mask="url(#mask0_976_5033)">
                                    <path d="M8.00016 10.6666L10.6668 7.99992L8.00016 5.33325L7.06683 6.26659L8.1335 7.33325H5.3335V8.66659H8.1335L7.06683 9.73325L8.00016 10.6666ZM8.00016 14.6666C7.07794 14.6666 6.21127 14.4915 5.40016 14.1413C4.58905 13.7915 3.8835 13.3166 3.2835 12.7166C2.6835 12.1166 2.20861 11.411 1.85883 10.5999C1.50861 9.78881 1.3335 8.92214 1.3335 7.99992C1.3335 7.0777 1.50861 6.21103 1.85883 5.39992C2.20861 4.58881 2.6835 3.88325 3.2835 3.28325C3.8835 2.68325 4.58905 2.20814 5.40016 1.85792C6.21127 1.50814 7.07794 1.33325 8.00016 1.33325C8.92239 1.33325 9.78905 1.50814 10.6002 1.85792C11.4113 2.20814 12.1168 2.68325 12.7168 3.28325C13.3168 3.88325 13.7917 4.58881 14.1415 5.39992C14.4917 6.21103 14.6668 7.0777 14.6668 7.99992C14.6668 8.92214 14.4917 9.78881 14.1415 10.5999C13.7917 11.411 13.3168 12.1166 12.7168 12.7166C12.1168 13.3166 11.4113 13.7915 10.6002 14.1413C9.78905 14.4915 8.92239 14.6666 8.00016 14.6666ZM8.00016 13.3333C9.48905 13.3333 10.7502 12.8166 11.7835 11.7833C12.8168 10.7499 13.3335 9.48881 13.3335 7.99992C13.3335 6.51103 12.8168 5.24992 11.7835 4.21659C10.7502 3.18325 9.48905 2.66659 8.00016 2.66659C6.51127 2.66659 5.25016 3.18325 4.21683 4.21659C3.1835 5.24992 2.66683 6.51103 2.66683 7.99992C2.66683 9.48881 3.1835 10.7499 4.21683 11.7833C5.25016 12.8166 6.51127 13.3333 8.00016 13.3333Z"
                                        fill="#F29C1F"/>
                                </g>
                            </svg>

                        </a>
                    </div>
                </div>
                <h2 class="fw-400"> {{$course_sequence[$desired_sequence]->title}}</h2>
                   
                <div class="course-description">
                    <div class="alert alert-warning" role="alert">You have alreday completed this quiz. You can retake this quiz only when you are eligible to retake this course. Which is after 2 Months of your course completion.</div>
                </div>

                <div class="d-flex justify-content-center align-items-center" style="min-height:300px;">
                    <i class="fas fa-lock" style="font-size:100px;color:gray"></i>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- Course single section end here -->

@endsection