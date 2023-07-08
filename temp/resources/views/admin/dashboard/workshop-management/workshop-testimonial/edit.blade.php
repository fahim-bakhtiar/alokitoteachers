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

        <div class="col-12">
            
            <div class="card card-info">

                <div class="card-header">

                    <h3 class="card-title">Edit Testimonial</h3>

                </div>

                <form method="POST" action="{{ route('workshop-management.workshop-testimonial.update', $workshop_testimonial->id) }}">

                    @csrf

                    <div class="card-body">

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="name">Name*</label>

                                    <input type="text" name="name" value="{{ old('name') ? old('name') : $workshop_testimonial->name }}" class="form-control" id="name" placeholder="Enter name">

                                    @error('name') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="profession">Profession*</label>

                                    <input type="text" name="profession" value="{{ old('profession') ? old('profession') : $workshop_testimonial->profession }}" class="form-control" id="profession" placeholder="Enter profession">

                                    @error('profession') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="designation">Designation</label>

                                    <input type="text" name="designation" value="{{ old('designation') ? old('designation') : $workshop_testimonial->designation }}" class="form-control" id="designation" placeholder="Enter designation">

                                    @error('designation') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="institution">Institution</label>

                                    <input type="text" name="institution" value="{{ old('institution') ? old('institution') : $workshop_testimonial->institution }}" class="form-control" id="institution" placeholder="Enter institution">

                                    @error('institution') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="comment">Comment*</label>

                                    <textarea id="comment" name="comment">{{ old('comment') ? old('comment') : $workshop_testimonial->comment }}</textarea>

                                    @error('comment') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">

                        <button type="submit" class="btn btn-info btn-flat"><i class="fas fa-arrow-alt-circle-right"></i> Update</button>

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

        $('#comment').summernote();

        bsCustomFileInput.init();

    });

  </script>

@endsection


