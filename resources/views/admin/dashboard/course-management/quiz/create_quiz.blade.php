@extends('admin.layouts.parent')


@section('css01')

<!-- Sweet Alert css-->
<link href="{{asset_url('dashboard/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

    <div class="row">

        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <h4 class="mb-sm-0">Add Quiz  </h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="{{route('course-management.course.list')}}">Course List</a></li>

                        <li class="breadcrumb-item"><a href="{{route('course-management.course.edit', $course->id)}}">Edit Course</a></li>

                        <li class="breadcrumb-item"><a href="{{route('course-management.course.sequence', $course->id)}}">Content Sequence</a></li>

                        <li class="breadcrumb-item active">Add Quiz</li>

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

                    <div class="col">

                        <h5 class="text-left pl-3">Course: {{$course->title}}</h5>

                    </div>

                </div>

            </div>

            <div class="card-body">

                <form method="post" action="{{route('course-management.course.quiz.create', $course->id)}}" enctype=multipart/form-data>

                    @csrf

                    <div class="card-body">

                        <div class="row mb-3">

                            <div class="col">

                                <div class="form-group">

                                    <label for="title">Quiz Title*</label>

                                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="Enter title">

                                    @error('title') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="sequence">Sequence No*</label>

                                    <input type="number" name="sequence" value="{{old('sequence') ? old('sequence') : ($course_sequence_numbers_latest + 1)}}"  class="form-control" id="sequence" placeholder="Enter sequence number" >

                                    @error('sequence') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="detail">Short Detail*</label>

                                    <textarea id="detail" name="detail">{{old('detail')}}</textarea>

                                </div>

                            </div>

                            

                            <input type="hidden" name="course_id" value="{{$course->id}}" >

                            

                        </div>

                        

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">

                        <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-arrow-alt-circle-right"></i> Create</button>

                    </div>

                </form>

            </div>

          </div>

        </div>

    </div>



@endsection


@section('js02')


<!-- Sweet Alerts js -->
<script src="{{asset_url('dashboard/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- ckeditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

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


    // ckeditor

    ClassicEditor.create( document.querySelector( '#detail' ) ).catch( error => {console.error( error );} );

</script>

@endsection


