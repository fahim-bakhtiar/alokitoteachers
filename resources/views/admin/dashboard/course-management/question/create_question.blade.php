@extends('admin.layouts.parent')


@section('css01')

<!-- Sweet Alert css-->
<link href="{{asset_url('dashboard/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

    <div class="row">

        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <h4 class="mb-sm-0">Add Question  </h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="{{route('course-management.course.list')}}">Course List</a></li>

                        <li class="breadcrumb-item"><a href="{{route('course-management.course.edit', $quiz->course->id)}}">Edit Course</a></li>

                        <li class="breadcrumb-item"><a href="{{route('course-management.course.sequence', $quiz->course->id)}}">Content Sequence</a></li>

                        <li class="breadcrumb-item"><a href="{{route('course-management.course.quiz.edit', $quiz->id)}}">Edit Quiz</a></li>

                        <li class="breadcrumb-item"><a href="{{route('course-management.course.question.list', $quiz->id)}}">List Questions</a></li>

                        <li class="breadcrumb-item active">Add Question</li>

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

                        <span class="text-left pl-3 fs-20">Course: {{$quiz->course->title}}</span>
                        <span><i class="bx bx-caret-right"></i></span>
                        <span class="text-left pl-3 fs-20">Quiz: {{$quiz->title}}</span>

                    </div>

                </div>

            </div>

            <div class="card-body">

                <form method="post" action="{{route('course-management.course.question.create', $quiz->id)}}" enctype=multipart/form-data>

                    @csrf

                    <div class="card-body">

                        <div class="row mb-3">

                            <div class="col">

                                <div class="form-group">

                                    <label for="title">Question*</label>

                                    <input type="text" name="question" value="{{old('question')}}" class="form-control" id="question" placeholder="Enter question">

                                    @error('question') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="title">Sequence No*</label>

                                    <input type="number" name="sequence" value="{{old('sequence') ? old('sequence') : ($latest_in_sequence + 1)}}" class="form-control" id="sequence" placeholder="Enter sequence">

                                    @error('sequence') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="title">Points*</label>

                                    <input type="number" name="points" value="{{old('points') ? old('points') : 5}}" class="form-control" id="points" placeholder="Number of points gained if answer is correct">

                                    @error('points') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                        </div>

                        <div class="bg-light color-palette p-5">

                            <div class="row">

                                <h5>Enter Options</h5>
                                <hr>

                            </div>

                            <div class="row">

                                <div class="col mb-3">

                                    <div class="form-group">

                                        <label for="title">Option 01*</label>

                                        <input type="text" name="option_1" value="{{old('option_1')}}" class="form-control" id="option_1" placeholder="Enter option 1">

                                        @error('option_1') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                    </div>

                                </div>                    

                            </div>

                            <div class="row">

                                <div class="col mb-3">

                                    <div class="form-group">

                                        <label for="title">Option 02*</label>

                                        <input type="text" name="option_2" value="{{old('option_2')}}" class="form-control" id="option_2" placeholder="Enter option 2">

                                        @error('option_2') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                    </div>

                                </div>                    

                            </div>

                            <div class="row">

                                <div class="col mb-3">

                                    <div class="form-group">

                                        <label for="title">Option 03*</label>

                                        <input type="text" name="option_3" value="{{old('option_3')}}" class="form-control" id="option_3" placeholder="Enter option 3">

                                        @error('option_3') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                    </div>

                                </div>                    

                            </div>

                            <div class="row">

                                <div class="col mb-3">

                                    <div class="form-group">

                                        <label for="title">Option 04*</label>

                                        <input type="text" name="option_4" value="{{old('option_4')}}" class="form-control" id="option_4" placeholder="Enter option 4">

                                        @error('option_4') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                    </div>

                                </div>                    

                            </div>


                            <div class="row">

                                <div class="col">

                                    <div class="form-group">

                                        <label for="title">Select the Correct Answer*</label>

                                        <select name="answer" class="form-control" id="asnwer">

                                            <option value="1" {{old('answer') == 1 ? 'selected' : ''}}>Option 1</option>
                                            <option value="2" {{old('answer') == 2 ? 'selected' : ''}}>Option 2</option>
                                            <option value="3" {{old('answer') == 3 ? 'selected' : ''}}>Option 3</option>
                                            <option value="4" {{old('answer') == 4 ? 'selected' : ''}}>Option 4</option>

                                        </select>

                                        @error('answer') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                    </div>

                                </div>                    

                            </div>

                            
                        </div>

                        <input type="hidden" name="quiz_id" value="{{$quiz->id}}" >

                        

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


