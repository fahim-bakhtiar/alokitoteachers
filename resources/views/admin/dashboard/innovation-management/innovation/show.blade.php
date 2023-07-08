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

                    <h3 class="card-title">Teacher: {{ $innovation->teacher->first_name . " " . $innovation->teacher->last_name }}</h3>

                </div>

                <div class="card-body" style="background-color: #f6f6f6;padding: 50px;">


                    <div class="row">

                        <div class="col-3"></div>

                        <div class="col-6">
                            <img class="img-responsive" style="max-width: 700px;" src="{{ $innovation->getAbsoluteThumbnailPath() }}" alt="">

                            <h2 style="font-weight: 800;margin-top: 25px;margin-bottom: 25px;font-size: 45px;color: #333;">{{ $innovation->title }}</h2>

                            <div>
                                {!! $innovation->description !!}
                            </div>
                        </div>

                        <div class="col-3"></div>

                    </div>
    
                    
                    

                </div>

                <form method="POST" action="{{ route('innovation-management.innovation.update-jury-points', $innovation->id) }}">

                    @csrf

                    <div class="card-body">

                        <div class="row justify-content-center">

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="jury_points">Jury Points</label>

                                    <input type="number" name="jury_points" value="{{ old('jury_points') ? old('jury_points') : $innovation->jury_points }}" class="form-control" id="jury_points" placeholder="Enter jury points">

                                    @error('jury_points') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                                <button type="submit" class="btn btn-info btn-flat"><i class="fas fa-arrow-alt-circle-right"></i> Update Jury Points</button>

                            </div>

                        </div>

                    </div>
                    <!-- /.card-body -->

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

    });

  </script>

@endsection


