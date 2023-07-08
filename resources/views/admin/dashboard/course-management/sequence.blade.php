@extends('admin.layouts.parent')

@section('css01')

<!-- Sweet Alert css-->
<link href="{{asset_url('dashboard/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

    <div class="row">

        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <h4 class="mb-sm-0">Content sequence  </h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="{{route('course-management.course.list')}}">Course List</a></li>

                        <li class="breadcrumb-item"><a href="{{route('course-management.course.edit', $course->id)}}">Edit Course</a></li>

                        <li class="breadcrumb-item active">Content Sequence</li>

                    </ol>

                </div>

            </div>
        </div>

    </div>    

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header text-right bg-gray-dark color-palette">

                    <div class="row">

                        <div class="col-6">

                            <h5 class="text-left pl-3">Course: {{$course->title}}</h5>

                        </div>

                        <!-- <div class="col-6" style="text-align: right;">

                            <a href="{{route('course-management.course.video.create', $course->id)}}" class="btn btn-success "><i class="fas fa fa-plus mr-1"></i> Add Video</a>
                            <a href="{{route('course-management.course.quiz.create', $course->id)}}" class="btn btn-primary"><i class="fas fa fa-plus mr-1"></i> Add Quiz</a>

                        </div> -->

                        <div class="col-6" style="text-align: end;">

                            <a href="{{route('course-management.course.video.create', $course->id)}}" class="btn btn-success btn-label"><i class="bx bx-plus-circle label-icon align-middle fs-16 me-2"></i> Add Video</a>

                            <a href="{{route('course-management.course.quiz.create', $course->id)}}" class="btn btn-success btn-label"><i class="bx bx-plus-circle label-icon align-middle fs-16 me-2"></i> Add Quiz</a>

                        </div>

                    </div>

                </div>

                
                <div class="card-body">

                    <table class="table table-sm table-bordered">

                        <thead>

                            <th>Type</th>

                            <th>Title</th>

                            <th>Sequence</th>

                            <th>Action</th>

                        </thead>


                        <tbody>
                            @foreach($list as $item)

                                <tr>
                                    <td width="10%" style="vertical-align:middle"><span class="badge badge-label bg-primary"><i class="mdi mdi-circle-medium"></i> {{$item->modelName()}}</span></td>

                                    <td width="30%" style="vertical-align:middle">{{$item->title}}</td> 


                                    <td width="40%">
                                        <form action="{{route('course-management.course.sequence.set', $course->id)}}" method="post">
                                            @csrf
                                            <div class="form-row align-items-center">
                                                <div class="input-group">
                                                    <input class="form-control" type="number" name="sequence" value="{{$item->sequence}}" id="">
                                                    <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2"></i> Update</button>
                                                </div>
                                                <input type="hidden" name="item_type" value="{{$item->modelName()}}"  id="">
                                                <input type="hidden" name="item_id" value="{{$item->id}}"  id="">
                                                <input type="hidden" name="course_id" value="{{$course->id}}"  id="">
                                            </div>
                                            
                                        </form>
                                    </td> 

                                    <td>
                                        @if($item->modelName() == 'video')
                                        <a class="btn btn-info" href="{{route('course-management.course.video.edit', $item->id)}}"><i class="far fa-edit mr-2"></i> Edit</a>
                                        @endif
                                        @if($item->modelName() == 'quiz')
                                        <a class="btn btn-info" href="{{route('course-management.course.quiz.edit', $item->id)}}"><i class="far fa-edit mr-2"></i> Edit</a>
                                        <a href="{{route('course-management.course.question.create', $item->id)}}" class="btn btn-info"><i class="far fa-plus-square mr-2"></i> Add Question</a>
                                        <a href="{{route('course-management.course.question.list', $item->id)}}" class="btn btn-info"><i class="far fa-list-alt mr-2"></i> List Questions</a>
                                        @endif
                                    </td> 
                                    
                                </tr>
                            
                            @endforeach

                        </tbody>

                    </table>
                    
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>

    </div>



@endsection




@section('js02')


<!-- Sweet Alerts js -->
<script src="{{asset_url('dashboard/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<script>

    @if(session('warning'))

        var message = '{{session("warning")}}';

        Swal.fire({
            html: '<div class="mt-3">' +
                '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' +
                '<div class="mt-4 pt-2 fs-15">' +
                '<h4>Oops...! Something went Wrong !</h4>' +
                '<p class="text-muted mx-4 mb-0">' + message + '</p>' +
                '</div>' +
                '</div>',
            showConfirmButton: false,
            buttonsStyling: false,
            showCloseButton: true,
            timer: 5000,
        })

    @endif

    @if(session('success'))

        var message = '{{session("success")}}';

        Swal.fire({
            html: '<div class="mt-3">' +
                '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
                '<div class="mt-4 pt-2 fs-15">' +
                '<h4>Success!</h4>' +
                '<p class="text-muted mx-4 mb-0">' + message + '</p>' +
                '</div>' +
                '</div>',
            showConfirmButton: false,
            buttonsStyling: false,
            showCloseButton: true,
            timer: 5000,
        })

    @endif

</script>

@endsection
