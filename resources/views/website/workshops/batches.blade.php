@extends('website.layouts.base')

@section('page-content')

<section class="upcoming-workshop">
    <div class="container">
        <div class="row mb-60 upcoming-workshop-header text-center text-lg-start">
            <div class="col-lg-8">
                
                <h2>{{$workshop->name}}</h2>
                <div class="iframe-container mb-4">
                    <iframe class="responsive-iframe" src="{{$workshop->preview_video_url}}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                </div>
                <p>{!!$workshop->learning_outcomes!!}</p>
            </div>
            <div class="col-lg-4">
                <img class="mb-3" src="{{$workshop->getAbsoluteThumbnailPath()}}"  alt="">
                <p> <strong>Total Credit Hours:</strong>  <span>{{$workshop->total_credit_hours}}</span></p>
                <p> <strong>Type:</strong> <span>{{$workshop->type}}</span></p>
            </div>
        </div>
    </div>
</section>

<!-- Workshops section start here -->
<section class="ready-workshop">
    <div class="container">
        <h3 class="fw-400 mb-40">Open Batches</h3>
        <div class="row gx-5">
            @foreach($batches as $batch)
            <div class="col-lg-4">
                <div class="batch-box">
                    
                    <div class="">
                        
                        <div class="d-flex flex-column justify-content-center">
                            <div class="d-flex justify-content-between">
                                <span class="date">{{date('d M Y', strtotime($batch->start_date))}} - {{date('d M Y', strtotime($batch->end_date))}}</span>
                                
                                <span style="background-color: #198754;font-size: 12px;padding: 3px;padding-left: 15px;padding-right: 15px;border-radius: 10px;color: #fff;" >{{$batch->limit}} Seats Remaining</span>
                            </div>

                            <div class="">
                                <h6>{{$batch->name}}</h6>
                            </div>
                            
                            @if($logged_in_teacher->id == 0)
                                <div class="">
                                    <a href="{{route('website.auth.teacher.signin')}}" class="btn-default">Login to Register <i class="ri-arrow-right-s-line"></i></a>
                                </div>
                            @else
                                <div class="">
                                    <a href="" class="btn-default" onclick="event.preventDefault();document.getElementById('purchase-form').submit();">Register <i class="ri-arrow-right-s-line"></i></a>
                                </div>

                                <form id="purchase-form" action="{{route('workshop.teacher.purchase', ['teacherID' => $logged_in_teacher->id, 'workshopID' => $workshop->id])}}" method="POST" style="display: none;">@csrf</form>
                            @endif
                        </div>
                    </div>
                    
            
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Workshops section end here -->

@endsection
