@extends('website.layouts.base')

@section('page-content')

<section class="profile">
    <div class="container">
        
        <div class="row g-5 flex-column-reverse flex-lg-row">
            <div class="col-lg-8">
                <div class="monthly-summery">
                    <div class="profile-header d-flex align-items-center mb-40">
                        <div class="d-flex align-items-center">
                            <img src="{{asset_url('website/assets/images/icons/calender.png')}}" alt="calender">
                            <h3 class="fw-400 mb-0">Summery</h3>
                        </div>
                    </div>
                    <div class="row monthly-summery-inner">
                        <div class="col-lg-4">
                            <div class="summery-card">
                                <p>Courses</p>
                                <h1>{{count($logged_in_teacher->courses)}}</h1>
                                <!-- <div class="text-end">
                                    <a href="profile-completed-course.html">
                                        দেখুন
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask0_1061_27198" style="mask-type:alpha"
                                                  maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                                <rect width="16" height="16" fill="#D9D9D9"/>
                                            </mask>
                                            <g mask="url(#mask0_1061_27198)">
                                                <path d="M8.00065 10.6666L10.6673 7.99992L8.00065 5.33325L7.06732 6.26659L8.13398 7.33325H5.33398V8.66659H8.13398L7.06732 9.73325L8.00065 10.6666ZM8.00065 14.6666C7.07843 14.6666 6.21176 14.4915 5.40065 14.1413C4.58954 13.7915 3.88398 13.3166 3.28398 12.7166C2.68398 12.1166 2.2091 11.411 1.85932 10.5999C1.5091 9.78881 1.33398 8.92214 1.33398 7.99992C1.33398 7.0777 1.5091 6.21103 1.85932 5.39992C2.2091 4.58881 2.68398 3.88325 3.28398 3.28325C3.88398 2.68325 4.58954 2.20814 5.40065 1.85792C6.21176 1.50814 7.07843 1.33325 8.00065 1.33325C8.92287 1.33325 9.78954 1.50814 10.6007 1.85792C11.4118 2.20814 12.1173 2.68325 12.7173 3.28325C13.3173 3.88325 13.7922 4.58881 14.142 5.39992C14.4922 6.21103 14.6673 7.0777 14.6673 7.99992C14.6673 8.92214 14.4922 9.78881 14.142 10.5999C13.7922 11.411 13.3173 12.1166 12.7173 12.7166C12.1173 13.3166 11.4118 13.7915 10.6007 14.1413C9.78954 14.4915 8.92287 14.6666 8.00065 14.6666ZM8.00065 13.3333C9.48954 13.3333 10.7507 12.8166 11.784 11.7833C12.8173 10.7499 13.334 9.48881 13.334 7.99992C13.334 6.51103 12.8173 5.24992 11.784 4.21659C10.7507 3.18325 9.48954 2.66659 8.00065 2.66659C6.51176 2.66659 5.25065 3.18325 4.21732 4.21659C3.18398 5.24992 2.66732 6.51103 2.66732 7.99992C2.66732 9.48881 3.18398 10.7499 4.21732 11.7833C5.25065 12.8166 6.51176 13.3333 8.00065 13.3333Z"
                                                      fill="#532437" fill-opacity="0.65"/>
                                            </g>
                                        </svg>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                        <!-- <div class="col-lg-4">
                            <div class="summery-card" style="background-color: #BFB5FF;">
                                <p>Resources</p>
                                <h1>১১টি</h1>
                                <div class="text-end">
                                    <a href="profile-selected-resources.html">
                                        দেখুন
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask0_1061_27198" style="mask-type:alpha"
                                                  maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                                <rect width="16" height="16" fill="#D9D9D9"/>
                                            </mask>
                                            <g mask="url(#mask0_1061_27198)">
                                                <path d="M8.00065 10.6666L10.6673 7.99992L8.00065 5.33325L7.06732 6.26659L8.13398 7.33325H5.33398V8.66659H8.13398L7.06732 9.73325L8.00065 10.6666ZM8.00065 14.6666C7.07843 14.6666 6.21176 14.4915 5.40065 14.1413C4.58954 13.7915 3.88398 13.3166 3.28398 12.7166C2.68398 12.1166 2.2091 11.411 1.85932 10.5999C1.5091 9.78881 1.33398 8.92214 1.33398 7.99992C1.33398 7.0777 1.5091 6.21103 1.85932 5.39992C2.2091 4.58881 2.68398 3.88325 3.28398 3.28325C3.88398 2.68325 4.58954 2.20814 5.40065 1.85792C6.21176 1.50814 7.07843 1.33325 8.00065 1.33325C8.92287 1.33325 9.78954 1.50814 10.6007 1.85792C11.4118 2.20814 12.1173 2.68325 12.7173 3.28325C13.3173 3.88325 13.7922 4.58881 14.142 5.39992C14.4922 6.21103 14.6673 7.0777 14.6673 7.99992C14.6673 8.92214 14.4922 9.78881 14.142 10.5999C13.7922 11.411 13.3173 12.1166 12.7173 12.7166C12.1173 13.3166 11.4118 13.7915 10.6007 14.1413C9.78954 14.4915 8.92287 14.6666 8.00065 14.6666ZM8.00065 13.3333C9.48954 13.3333 10.7507 12.8166 11.784 11.7833C12.8173 10.7499 13.334 9.48881 13.334 7.99992C13.334 6.51103 12.8173 5.24992 11.784 4.21659C10.7507 3.18325 9.48954 2.66659 8.00065 2.66659C6.51176 2.66659 5.25065 3.18325 4.21732 4.21659C3.18398 5.24992 2.66732 6.51103 2.66732 7.99992C2.66732 9.48881 3.18398 10.7499 4.21732 11.7833C5.25065 12.8166 6.51176 13.3333 8.00065 13.3333Z"
                                                      fill="#532437" fill-opacity="0.65"/>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-4">
                            <div class="summery-card" style="background-color: #C7F4C2;">
                                <p>Workshops</p>
                                <h1>১টি</h1>
                                <div class="text-end">
                                    <a href="">
                                        দেখুন
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask0_1061_27198" style="mask-type:alpha"
                                                  maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                                <rect width="16" height="16" fill="#D9D9D9"/>
                                            </mask>
                                            <g mask="url(#mask0_1061_27198)">
                                                <path d="M8.00065 10.6666L10.6673 7.99992L8.00065 5.33325L7.06732 6.26659L8.13398 7.33325H5.33398V8.66659H8.13398L7.06732 9.73325L8.00065 10.6666ZM8.00065 14.6666C7.07843 14.6666 6.21176 14.4915 5.40065 14.1413C4.58954 13.7915 3.88398 13.3166 3.28398 12.7166C2.68398 12.1166 2.2091 11.411 1.85932 10.5999C1.5091 9.78881 1.33398 8.92214 1.33398 7.99992C1.33398 7.0777 1.5091 6.21103 1.85932 5.39992C2.2091 4.58881 2.68398 3.88325 3.28398 3.28325C3.88398 2.68325 4.58954 2.20814 5.40065 1.85792C6.21176 1.50814 7.07843 1.33325 8.00065 1.33325C8.92287 1.33325 9.78954 1.50814 10.6007 1.85792C11.4118 2.20814 12.1173 2.68325 12.7173 3.28325C13.3173 3.88325 13.7922 4.58881 14.142 5.39992C14.4922 6.21103 14.6673 7.0777 14.6673 7.99992C14.6673 8.92214 14.4922 9.78881 14.142 10.5999C13.7922 11.411 13.3173 12.1166 12.7173 12.7166C12.1173 13.3166 11.4118 13.7915 10.6007 14.1413C9.78954 14.4915 8.92287 14.6666 8.00065 14.6666ZM8.00065 13.3333C9.48954 13.3333 10.7507 12.8166 11.784 11.7833C12.8173 10.7499 13.334 9.48881 13.334 7.99992C13.334 6.51103 12.8173 5.24992 11.784 4.21659C10.7507 3.18325 9.48954 2.66659 8.00065 2.66659C6.51176 2.66659 5.25065 3.18325 4.21732 4.21659C3.18398 5.24992 2.66732 6.51103 2.66732 7.99992C2.66732 9.48881 3.18398 10.7499 4.21732 11.7833C5.25065 12.8166 6.51176 13.3333 8.00065 13.3333Z"
                                                      fill="#532437" fill-opacity="0.65"/>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="finished-course mb-40">
                    <div class="profile-header d-flex flex-wrap flex-sm-nowrap align-items-center justify-content-between mb-40">
                        <div class="d-flex align-items-center mb-4 mb-sm-0">
                            <img src="{{asset_url('website/assets/images/icons/book.png')}}" alt="calender">
                            <h3 class="fw-400 mb-0">Course List</h3>
                        </div>
                        <!-- <a href="" class="btn-default btn-secondary btn-sm">
                            See All Your Courses
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_1061_28121" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0"
                                      y="0" width="16" height="16">
                                    <rect width="16" height="16" fill="#D9D9D9"/>
                                </mask>
                                <g mask="url(#mask0_1061_28121)">
                                    <path d="M8.00065 10.6668L10.6673 8.00016L8.00065 5.3335L7.06732 6.26683L8.13398 7.3335H5.33398V8.66683H8.13398L7.06732 9.7335L8.00065 10.6668ZM8.00065 14.6668C7.07843 14.6668 6.21176 14.4917 5.40065 14.1415C4.58954 13.7917 3.88398 13.3168 3.28398 12.7168C2.68398 12.1168 2.2091 11.4113 1.85932 10.6002C1.5091 9.78905 1.33398 8.92239 1.33398 8.00016C1.33398 7.07794 1.5091 6.21127 1.85932 5.40016C2.2091 4.58905 2.68398 3.8835 3.28398 3.2835C3.88398 2.6835 4.58954 2.20838 5.40065 1.85816C6.21176 1.50838 7.07843 1.3335 8.00065 1.3335C8.92287 1.3335 9.78954 1.50838 10.6007 1.85816C11.4118 2.20838 12.1173 2.6835 12.7173 3.2835C13.3173 3.8835 13.7922 4.58905 14.142 5.40016C14.4922 6.21127 14.6673 7.07794 14.6673 8.00016C14.6673 8.92239 14.4922 9.78905 14.142 10.6002C13.7922 11.4113 13.3173 12.1168 12.7173 12.7168C12.1173 13.3168 11.4118 13.7917 10.6007 14.1415C9.78954 14.4917 8.92287 14.6668 8.00065 14.6668ZM8.00065 13.3335C9.48954 13.3335 10.7507 12.8168 11.784 11.7835C12.8173 10.7502 13.334 9.48905 13.334 8.00016C13.334 6.51127 12.8173 5.25016 11.784 4.21683C10.7507 3.1835 9.48954 2.66683 8.00065 2.66683C6.51176 2.66683 5.25065 3.1835 4.21732 4.21683C3.18398 5.25016 2.66732 6.51127 2.66732 8.00016C2.66732 9.48905 3.18398 10.7502 4.21732 11.7835C5.25065 12.8168 6.51176 13.3335 8.00065 13.3335Z"
                                          fill="#F29C1F"/>
                                </g>
                            </svg>
                        </a> -->
                    </div>
                    <div class="finished-course-inner">
                    
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Progress</th>
                                <th scope="col">Total Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logged_in_teacher->courses as $course)
                                <tr>
                                    <th scope="row">{{ $loop->iteration}}</th>
                                    <td><a target="blank" href="{{route('website.courses.single', $course->id)}}">{{$course->title}}</a></td>
                                    <td>{{$course->get_current_progress($logged_in_teacher->id)}}%</td>
                                    <td>{{$course->total_marks($logged_in_teacher->id)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                    </div>
                </div>
                <!-- <div class="workshop-score pt-60">
                    <div class="profile-header d-flex flex-wrap flex-sm-nowrap align-items-center justify-content-between mb-40">
                        <div class="d-flex align-items-center mb-4 mb-sm-0">
                            <img src="{{asset_url('website/assets/images/icons/people.png')}}" alt="calender">
                            <h3 class="fw-400 mb-0">ওয়ার্কশপ স্কোর</h3>
                        </div>
                        <a href="" class="btn-default btn-secondary btn-sm">
                            লিডারবোর্ডে আপনার র‍্যাংক
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_1061_28121" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0"
                                      y="0" width="16" height="16">
                                    <rect width="16" height="16" fill="#D9D9D9"/>
                                </mask>
                                <g mask="url(#mask0_1061_28121)">
                                    <path d="M8.00065 10.6668L10.6673 8.00016L8.00065 5.3335L7.06732 6.26683L8.13398 7.3335H5.33398V8.66683H8.13398L7.06732 9.7335L8.00065 10.6668ZM8.00065 14.6668C7.07843 14.6668 6.21176 14.4917 5.40065 14.1415C4.58954 13.7917 3.88398 13.3168 3.28398 12.7168C2.68398 12.1168 2.2091 11.4113 1.85932 10.6002C1.5091 9.78905 1.33398 8.92239 1.33398 8.00016C1.33398 7.07794 1.5091 6.21127 1.85932 5.40016C2.2091 4.58905 2.68398 3.8835 3.28398 3.2835C3.88398 2.6835 4.58954 2.20838 5.40065 1.85816C6.21176 1.50838 7.07843 1.3335 8.00065 1.3335C8.92287 1.3335 9.78954 1.50838 10.6007 1.85816C11.4118 2.20838 12.1173 2.6835 12.7173 3.2835C13.3173 3.8835 13.7922 4.58905 14.142 5.40016C14.4922 6.21127 14.6673 7.07794 14.6673 8.00016C14.6673 8.92239 14.4922 9.78905 14.142 10.6002C13.7922 11.4113 13.3173 12.1168 12.7173 12.7168C12.1173 13.3168 11.4118 13.7917 10.6007 14.1415C9.78954 14.4917 8.92287 14.6668 8.00065 14.6668ZM8.00065 13.3335C9.48954 13.3335 10.7507 12.8168 11.784 11.7835C12.8173 10.7502 13.334 9.48905 13.334 8.00016C13.334 6.51127 12.8173 5.25016 11.784 4.21683C10.7507 3.1835 9.48954 2.66683 8.00065 2.66683C6.51176 2.66683 5.25065 3.1835 4.21732 4.21683C3.18398 5.25016 2.66732 6.51127 2.66732 8.00016C2.66732 9.48905 3.18398 10.7502 4.21732 11.7835C5.25065 12.8168 6.51176 13.3335 8.00065 13.3335Z"
                                          fill="#F29C1F"/>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="workshop-score-inner">
                        <div class="row g-3 g-md-5">
                            <div class="col-md-6">
                                <div class="attended-workshop">
                                    <div class="progress">৮০%</div>
                                    <div class="progress-content">
                                        <h6 class="fw-600 mb-10">Fun ways to teach: Subject-based games to make learning
                                            engaging & joyful</h6>
                                        <span class="date">22 Jul, 2022</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="attended-workshop">
                                    <div class="progress">৭০%</div>
                                    <div class="progress-content">
                                        <h6 class="fw-600 mb-10">Critical Question Formulation and Effective
                                            Feedback</h6>
                                        <span class="date">22 Jul, 2022</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="attended-workshop">
                                    <div class="progress">৯৮%</div>
                                    <div class="progress-content">
                                        <h6 class="fw-600 mb-10">Classroom Management</h6>
                                        <span class="date">22 Jul, 2022</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="attended-workshop">
                                    <div class="progress">৯৮%</div>
                                    <div class="progress-content">
                                        <h6 class="fw-600 mb-10">Students Need-based Learning</h6>
                                        <span class="date">22 Jul, 2022</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="your-blog pt-60">
                    <div class="profile-header d-flex align-items-center justify-content-between mb-40">
                        <div class="d-flex align-items-center">
                            <img src="{{asset_url('website/assets/images/icons/wifi.png')}}" alt="calender">
                            <h3 class="fw-400 mb-0">আপনার ব্লগ</h3>
                        </div>
                    </div>
                    <div class="your-blog-inner">
                        <div class="blog-item">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="blog-thumb">
                                        <img src="{{asset_url('website/assets/images/blog.png')}}" class="blog-image" alt="blog">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <a href="" class="blog-author">
                                        <div class="avatar">
                                            <img src="{{asset_url('website/assets/images/inno-teacher.png')}}" alt="avatar">
                                        </div>
                                        <span>টিচার ইউজার</span>
                                    </a>
                                    <p class="fw-600 blog-title">বাস্তব উপকরণ ব্যবহার করি, শিখন হবে তাড়াতাড়ি। বাস্তব
                                        উপকরণ ব্যবহার করি, শিখন হবে তাড়াতাড়ি। </p>
                                    <div class="blog-footer">
                                        <span class="date">08 Feb, 2022</span>
                                        <ul class="blog-ratting">
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
                        <div class="blog-item">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="blog-thumb">
                                        <img src="{{asset_url('website/assets/images/blog.png')}}" class="blog-image" alt="blog">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <a href="" class="blog-author">
                                        <div class="avatar">
                                            <img src="{{asset_url('website/assets/images/inno-teacher.png')}}" alt="avatar">
                                        </div>
                                        <span>টিচার ইউজার</span>
                                    </a>
                                    <p class="fw-600 blog-title">বাস্তব উপকরণ ব্যবহার করি, শিখন হবে তাড়াতাড়ি। বাস্তব
                                        উপকরণ ব্যবহার করি, শিখন হবে তাড়াতাড়ি। </p>
                                    <div class="blog-footer">
                                        <span class="date">08 Feb, 2022</span>
                                        <ul class="blog-ratting">
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
                        <div class="blog-item">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="blog-thumb">
                                        <img src="{{asset_url('website/assets/images/blog.png')}}" class="blog-image" alt="blog">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <a href="" class="blog-author">
                                        <div class="avatar">
                                            <img src="{{asset_url('website/assets/images/inno-teacher.png')}}" alt="avatar">
                                        </div>
                                        <span>টিচার ইউজার</span>
                                    </a>
                                    <p class="fw-600 blog-title">বাস্তব উপকরণ ব্যবহার করি, শিখন হবে তাড়াতাড়ি। বাস্তব
                                        উপকরণ ব্যবহার করি, শিখন হবে তাড়াতাড়ি। </p>
                                    <div class="blog-footer">
                                        <span class="date">08 Feb, 2022</span>
                                        <ul class="blog-ratting">
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
                    </div>
                </div> -->
                <div class="your-review pt-60 pb-60">
                    <div class="profile-header d-flex flex-wrap flex-sm-nowrap align-items-center justify-content-between mb-40">
                        <div class="d-flex align-items-center mb-4 mb-sm-0">
                            <img src="{{asset_url('website/assets/images/icons/idea.png')}}" alt="calender">
                            <h3 class="fw-400 mb-0">Your Innovations</h3>
                        </div>
                        <a href="{{route('teacher.innovation.create')}}" class="btn-default btn-secondary btn-sm">
                            Add Innovation
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_1061_28121" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0"
                                      y="0" width="16" height="16">
                                    <rect width="16" height="16" fill="#D9D9D9"/>
                                </mask>
                                <g mask="url(#mask0_1061_28121)">
                                    <path d="M8.00065 10.6668L10.6673 8.00016L8.00065 5.3335L7.06732 6.26683L8.13398 7.3335H5.33398V8.66683H8.13398L7.06732 9.7335L8.00065 10.6668ZM8.00065 14.6668C7.07843 14.6668 6.21176 14.4917 5.40065 14.1415C4.58954 13.7917 3.88398 13.3168 3.28398 12.7168C2.68398 12.1168 2.2091 11.4113 1.85932 10.6002C1.5091 9.78905 1.33398 8.92239 1.33398 8.00016C1.33398 7.07794 1.5091 6.21127 1.85932 5.40016C2.2091 4.58905 2.68398 3.8835 3.28398 3.2835C3.88398 2.6835 4.58954 2.20838 5.40065 1.85816C6.21176 1.50838 7.07843 1.3335 8.00065 1.3335C8.92287 1.3335 9.78954 1.50838 10.6007 1.85816C11.4118 2.20838 12.1173 2.6835 12.7173 3.2835C13.3173 3.8835 13.7922 4.58905 14.142 5.40016C14.4922 6.21127 14.6673 7.07794 14.6673 8.00016C14.6673 8.92239 14.4922 9.78905 14.142 10.6002C13.7922 11.4113 13.3173 12.1168 12.7173 12.7168C12.1173 13.3168 11.4118 13.7917 10.6007 14.1415C9.78954 14.4917 8.92287 14.6668 8.00065 14.6668ZM8.00065 13.3335C9.48954 13.3335 10.7507 12.8168 11.784 11.7835C12.8173 10.7502 13.334 9.48905 13.334 8.00016C13.334 6.51127 12.8173 5.25016 11.784 4.21683C10.7507 3.1835 9.48954 2.66683 8.00065 2.66683C6.51176 2.66683 5.25065 3.1835 4.21732 4.21683C3.18398 5.25016 2.66732 6.51127 2.66732 8.00016C2.66732 9.48905 3.18398 10.7502 4.21732 11.7835C5.25065 12.8168 6.51176 13.3335 8.00065 13.3335Z"
                                          fill="#F29C1F"/>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="your-review-inner">
                        <div class="row">

                            @foreach ($innovations as $innovation)
                                
                                <div class="col-lg-6">
                                    <div class="review-item">
                                        <div class="review-thumb">
                                            <img src="{{ $innovation->getAbsoluteThumbnailPath() }}" class="review-image" alt="review">
                                        </div>
                                        <span class="review-author">
                                            <div class="avatar">
                                                <img style="border-radius:100%" src="{{ $logged_in_teacher->getAbsoluteProfileImagePath() }}" alt="avatar">
                                            </div>
                                            <span>{{ $logged_in_teacher->first_name . " " . $logged_in_teacher->last_name }}</span>
                                        </span>
                                        <a href="{{ route('teacher.innovation.edit', $innovation->id) }}">
                                            <p class="fw-600 review-title">{{ $innovation->title }}</p>
                                        </a>
                                        <div class="review-footer">
                                            <span class="date">{{ date_format(date_create($innovation->created_at), 'd M, Y') }}</span>
                                            <ul class="review-ratting">
                                                <li><i class="ri-star-fill"></i></li>
                                                <li><i class="ri-star-fill"></i></li>
                                                <li><i class="ri-star-fill"></i></li>
                                                <li><i class="ri-star-fill"></i></li>
                                                <li><i class="ri-star-line"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
            @include('teacher.includes.sidebar')
        </div>
    </div>
</section>
<!-- Profile section end here -->

@endsection