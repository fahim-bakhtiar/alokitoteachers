@extends('website.layouts.base')


@section('css02')

<!-- Sweet Alert css-->
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css
" rel="stylesheet">

@endsection

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
        <h3 class="fw-400 mb-40">Batches</h3>
        <div class="row gx-5">
            @if($batches->count() > 0)
                @foreach($batches as $batch)
                <div class="col-lg-4">
                    @if($alreday_registered['status'] == true)
                    <div class="batch-box" @if($alreday_registered['batch'] == $batch->id) style="border:1px solid #0ad30a;" @endif >
                        
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
                                        @if($alreday_registered['batch'] == $batch->id)
                                            <a href="#" class="btn-default" style="cursor: not-allowed;">Alreday Registered <i class="ri-arrow-right-s-line"></i></a>
                                        @else
                                            <a href="#" class="btn-default" style="background-color: #c7c7c7;color: gray;border: 1px solid #c7c7c7;cursor: not-allowed;" disbaled>Register <i class="ri-arrow-right-s-line"></i></a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="batch-box" >
                        
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

                                    <form id="purchase-form" action="{{route('workshop.teacher.purchase', ['teacherID' => $logged_in_teacher->id, 'workshopID' => $workshop->id, 'batchID' => $batch->id])}}" method="POST" style="display: none;">@csrf</form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            @else

                <div class="col">
                    <p class="alert alert-warning" role="alert">
                        No open batches availbale
                    </p>
                </div>

            @endif
        </div>
    </div>
</section>
<!-- Workshops section end here -->

@endsection


@section('js02')

<!-- Sweet Alerts js -->
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js
"></script>

@if(session('success'))
<script>
    Swal.fire({
        title: 'Success!',
        text: 'Your payment is received and you are successfully registered into this workshop.',
        icon: 'success',
        confirmButtonText: 'Ok'
    })
</script>
@endif
@endsection