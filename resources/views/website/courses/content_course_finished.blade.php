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
                            <a href="{{route('course.teacher.load_course_content', ['courseID' => $course->id, 'desired_sequence' => $key])}}" >
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
                <div class="course-nav">

                    <h3 class="d-block mb-3">Your Score: <strong>{{$progress->get_total_marks()}}</strong> </h3>

                </div>
                <h2 class="fw-400"> Congratulations!</h2>


                   
                <div class="course-description">
                    <div class="alert alert-success" role="alert">You have succesfully finished the course! You can watch the course videos any time you want, but can not take the quizzes. For that you need to wait for 2 more months, then you can retake the course and give quizzes. </div>
                </div>

                <div class="d-flex justify-content-center align-items-center" style="min-height:300px;">
                    <lord-icon
                        src="https://cdn.lordicon.com/xxdqfhbi.json"
                        trigger="hover"
                        style="width:5000px;height:500px">
                    </lord-icon>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- Course single section end here -->

@endsection

@section('js02')

<script src="https://cdn.lordicon.com/ritcuqlt.js"></script>

@endsection