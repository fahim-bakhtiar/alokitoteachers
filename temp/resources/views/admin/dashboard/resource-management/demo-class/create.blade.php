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

                <a href="{{route('resource-management.demo-class.index')}}" class="btn btn-primary btn-lg mr-1"> <i class="fas fa-columns mr-1"></i> Main</a>

                <a href="{{route('resource-management.demo-class.list')}}" class="btn btn-primary btn-lg"> <i class="fas fa-th-list mr-1"></i> Demo Classes</a>

            </div>

        </div>

        <div class="col-12">
            
            <div class="card card-info">

                <div class="card-header">

                    <h3 class="card-title">Create Demo Class</h3>

                </div>

                <form method="POST" action="{{ route('resource-management.demo-class.store') }}">

                    @csrf

                    <div class="card-body">

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="title">Title*</label>

                                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="Enter title">

                                    @error('title') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label>Class/Grade*</label>

                                    <select class="form-control select2bs4" name="class" style="width: 100%;">

                                        <option selected disabled>Select</option>

                                        @foreach($grades as $grade)

                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>

                                        @endforeach

                                    </select>

                                    @error('class') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label>Subject*</label>

                                    <select class="form-control select2bs4" name="subject" style="width: 100%;">

                                        <option selected disabled>Select</option>

                                        @foreach($subjects as $subject)

                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>

                                        @endforeach

                                    </select>

                                    @error('subject') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="video_url">Video URL*</label>

                                    <input type="text" name="video_url" value="{{old('video_url')}}" class="form-control" id="video_url" placeholder="Enter video url">

                                    @error('video_url') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="duration">Duration (Minutes)*</label>

                                    <input type="number" name="duration" value="{{old('duration')}}" class="form-control" id="duration" placeholder="Enter duration">

                                    @error('duration') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="price">Price*</label>

                                    <input type="number" name="price" value="{{old('price')}}" class="form-control" id="price" placeholder="Enter price">

                                    @error('price') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="sale_price">Sale Price</label>

                                    <input type="number" name="sale_price" value="{{old('sale_price')}}" class="form-control" id="sale_price" placeholder="Enter sale price">

                                    @error('sale_price') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">

                        <button type="submit" class="btn btn-info btn-flat"><i class="fas fa-arrow-alt-circle-right"></i> Create</button>

                    </div>

                </form>

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
  <script src="{{asset_url('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

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

        bsCustomFileInput.init();

    });

  </script>

@endsection


