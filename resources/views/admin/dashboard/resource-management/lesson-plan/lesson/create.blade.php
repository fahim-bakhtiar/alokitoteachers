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

            <div class="p-3" style="background-color:#e1e1e1">

                <a href="{{route('resource-management.lessonplan.index')}}" class="btn btn-primary btn-lg mr-1"> <i class="fas fa-columns mr-1"></i> Main</a>

            </div>

        </div>

        <div class="col-12">
            
          <div class="card">

            <div class="card-header">
                <div class="d-flex justify-content-between">

                    <div>
                        <span class="badge badge-warning px-4 py-2 mr-2">Lesson Plan :</span>  <span>{{$lessonplan->title}}</span>
                        
                    </div>

                    <div>
                        <a href="{{route('resource-management.lesson.list', $lessonplan->id)}}" class="btn btn-success btn-sm"><i class="fas fa-list mr-1"></i> Lessons</a>
                        <a href="{{route('resource-management.lessonplan.list')}}" class="btn btn-primary btn-sm"><i class="fas fa-list mr-1"></i> Lesson Plans</a>
                    </div>

                </div>
            </div>

            <div class="card-body">

                <form method="post" action="{{route('resource-management.lesson.create', $lessonplan->id)}}">

                    @csrf

                    <input type="hidden" name="lessonplan_id" value="{{$lessonplan->id}}">

                    <div class="card-body">

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="segment">ক্লাসের অংশ*</label>

                                    <input type="text" name="segment" value="{{old('segment')}}" class="form-control" id="segment" placeholder="Enter Segment of the class">

                                    @error('segment') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="price">মেথড*</label>

                                    <input type="text" name="method" value="{{old('method')}}"  class="form-control" id="price" placeholder="Enter teaching method" >

                                    @error('method') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="sale_price">সময় (মিনিটে)*</label>

                                    <input type="text" name="duration" value="{{old('duration')}}"  class="form-control" id="duration" placeholder="Enter Duration" >

                                    @error('duration') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="activity">এক্টিভিটি *</label>

                                    <textarea id="activity" name="activity">{{old('activity') ? old('activity') : ''}}</textarea>

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="tools">উপকরণ*</label>

                                    <textarea id="tools" name="tools">{{old('tools') ? old('tools') : ''}}</textarea>

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="reflection">রিফ্লেকশন*</label>

                                    <textarea id="reflection" name="reflection">{{old('reflection') ? old('reflection') : ''}}</textarea>

                                </div>

                            </div>

                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">

                        <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-arrow-alt-circle-right"></i> Create</button>

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


        $('#tools').summernote();

        $('#reflection').summernote();

        $('#activity').summernote();

    });

  </script>

@endsection


