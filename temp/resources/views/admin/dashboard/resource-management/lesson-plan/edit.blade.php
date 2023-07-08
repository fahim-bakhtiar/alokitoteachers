@extends('admin.layouts.base')


@section('style')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset_url('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

<style>
    .note-editor.note-airframe .note-editing-area .note-editable, .note-editor.note-frame .note-editing-area .note-editable {
        min-height: 344px;
    }

    .select2-container--default .select2-selection--single {
        height: 38px;
    }
</style>

@endsection

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-12 mb-4">

            
                <div class="p-3 d-flex justify-content-between" style="background-color:#e1e1e1">

                    <div>

                        <a href="{{route('resource-management.lessonplan.index')}}" class="btn btn-primary btn-lg mr-1"> <i class="fas fa-columns mr-1"></i> Main</a>

                        <a href="{{route('resource-management.lessonplan.list')}}" class="btn btn-primary btn-lg mr-1"> <i class="fas fa-th-list mr-1"></i> Lesson Plans</a>

                    </div>

                    <div>

                        <a href="{{route('resource-management.lesson.create', $lp->id)}}" class="btn btn-secondary btn-lg"> <i class="fas fa-plus-circle"></i>  Add Lesson</a>

                        <a href="{{route('resource-management.lesson.list', $lp->id)}}" class="btn btn-secondary btn-lg mr-1"> <i class="fas fa-th-list mr-1"></i> List Lessons</a>

                    </div>

                    
                </div>


        </div>

        <div class="col-12">
            
          <div class="card">

            <div class="card-body">

                <form method="post" action="{{route('resource-management.lessonplan.edit', $lp->id)}}">

                    @csrf

                    <div class="card-body">

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="title">Title*</label>

                                    <input type="text" name="title" value="{{old('title') ? $lp->title : $lp->title}}" class="form-control" id="title" placeholder="Enter title">

                                    @error('title') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="price">Price*</label>

                                    <input type="number" name="price" value="{{old('price') ? $lp->price : $lp->price}}"  class="form-control" id="price" placeholder="Enter price" >

                                    @error('price') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="sale_price">Duration* (in minutes)</label>

                                    <input type="text" name="duration" value="{{old('duration') ? $lp->duration : $lp->duration}}"  class="form-control" id="duration" placeholder="Enter Duration" >

                                    @error('duration') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="details">Lesson Plan Details*</label>

                                    <textarea id="details" name="details">{{old('details') ? $lp->details : $lp->details}}</textarea>

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="learning_outcomes">Learning Outcomes*</label>

                                    <textarea id="learning_outcomes" name="learning_outcomes">{{old('learning_outcomes') ? $lp->learning_outcomes : $lp->learning_outcomes}}</textarea>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label>Grade Level (শ্রেণী)*</label>

                                    <select class="form-control select2bs4" name="class" style="width: 100%;">

                                        <option selected="selected">Select</option>

                                        @foreach($grades as $grade)

                                            <option value="{{$grade->id}}" @if($grade->id == $lp->grade_level()->id) selected @endif>{{$grade->name}}</option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label> Subject* </label>

                                    <select class="form-control select2bs4" name="subject" style="width: 100%;">

                                        <option selected="selected">Select</option>

                                        @foreach($subjects as $subject)

                                            <option value="{{$subject->id}}" @if($subject->id == $lp->subject()->id) selected @endif>{{$subject->name}}</option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                        </div>

                        <input type="hidden" name="status" value="0">


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">

                        <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-arrow-alt-circle-right"></i> Update</button>

                    </div>

                </form>

            </div>

          </div>

        </div>

    </div>

</div>

@endsection


@section('script01')

  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="{{asset_url('plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <script src="{{asset_url('plugins/select2/js/select2.full.min.js')}}"></script>

  @if(session('success'))

  <script>
    
    $(function() {
      toastr.success({{ Js::from(session('success')) }});
    });

  </script>

  @endif

  <script>

    $(function() {

        $('.select2').select2();

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $('#learning_outcomes').summernote();

        $('#details').summernote();

    });

  </script>

@endsection


