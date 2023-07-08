@extends('admin.layouts.parent')


@section('css01')

<!-- Filepond css -->
<link rel="stylesheet" href="{{asset_url('dashboard/assets/libs/filepond/filepond.min.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset_url('dashboard/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}">

<!-- Sweet Alert css-->
<link href="{{asset_url('dashboard/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

    <div class="row">

        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <h4 class="mb-sm-0">Create Workshop  </h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item active">Create Workshop</li>

                    </ol>

                </div>

            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-12">
            
            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">Create Workshop</h3>

                </div>

                <form method="POST" action="{{ route('workshop-management.workshop.store') }}" enctype="multipart/form-data">

                    @csrf

                    <div class="card-body">

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="name">Name*</label>

                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Enter name">

                                    @error('name') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="price">Price*</label>

                                    <input type="number" name="price" value="{{old('price')}}" class="form-control" id="price" placeholder="Enter price">

                                    @error('price') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="sale_price">Sale Price</label>

                                    <input type="number" name="sale_price" value="{{old('sale_price')}}" class="form-control" id="sale_price" placeholder="Enter sale price">

                                    @error('sale_price') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label>Type*</label>

                                    <select name="type" class="form-control select2bs4" style="width: 100%;">

                                        <option selected disabled>Select Workshop Type</option>
                                        <option value="Online">Online</option>
                                        <option value="Offline">Offline</option>
                                        <option value="Blended">Blended</option>

                                    </select>

                                    @error('type') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="preview_video_url">Preview Video URL*</label>

                                    <input type="text" name="preview_video_url" value="{{old('preview_video_url')}}" class="form-control" id="preview_video_url" placeholder="Enter preview video url">

                                    @error('preview_video_url') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            

                        </div>

                        <div class="row mt-3">

                            
                            <div class="col">

                                <div class="form-group">

                                    <label for="description" class="form-label">Description*</label>

                                    <textarea id="description" name="description">{{old('description')}}</textarea>

                                    @error('description') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>
                            

                        </div>

                        <div class="row mt-3">

                            <div class="col-12">
                                
                                <div class="form-group">

                                    <label for="exampleInputFile">Thumbnail</label>

                                         <input type="file" class="filepond filepond-input-multiple" name="thumbnail" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                                        
                                        <br>
                                        @error('thumbnail') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror


                                </div>

                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="col">

                                <label for="trainers" class="form-label">Trainers*</label>

                                <select class="form-control" id="trainers" data-choices data-choices-removeItem name="trainers[]" multiple>

                                    @foreach($trainers as $trainer)
                                        
                                        <option value="{{ $trainer->id }}">{{ $trainer->first_name }} {{ $trainer->last_name }}</option>

                                    @endforeach

                                </select>

                                @error('trainers') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="duration">Duration (Days)*</label>

                                    <input type="number" name="duration" value="{{old('duration')}}" class="form-control" id="duration" placeholder="Enter duration">

                                    @error('duration') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="total_credit_hours">Total Credit Hours*</label>

                                    <input type="number" name="total_credit_hours" value="{{old('total_credit_hours')}}" class="form-control" id="total_credit_hours" placeholder="Enter total credit hours">

                                    @error('total_credit_hours') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="col mb-3">

                                <label for="">Start Date*</label>

                                <div class="input-group date" id="start_date" data-target-input="nearest">

                                    <input type="text" class="form-control" name="start_date" value="{{old('start_date') ? date('d M, Y', strtotime(old('start_date'))): ''}}" data-provider="flatpickr" data-date-format="d M, Y" >

                                    <span class="input-group-text" id="basic-addon1"> <i class="bx bx-calendar fs-20"></i> </span>
                                    
                                </div>

                            </div>

                            <div class="col mb-3">

                                <label for="">End Date*</label>

                                <div class="input-group date" id="end_date" data-target-input="nearest">

                                    <input type="text" class="form-control" name="end_date" value="{{old('end_date') ? date('d M, Y', strtotime(old('end_date'))): ''}}" data-provider="flatpickr" data-date-format="d M, Y" >

                                    <span class="input-group-text" id="basic-addon1"> <i class="bx bx-calendar fs-20"></i> </span>
                                    
                                </div>

                            </div>
                            
                        </div>

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="learning_outcomes" class="form-label">Learning Outcomes*</label>

                                    <textarea id="learning_outcomes" name="learning_outcomes">{{old('learning_outcomes')}}</textarea>

                                    @error('learning_outcomes') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

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



@endsection


@section('js02')

<!-- filepond js -->
<script src="{{asset_url('dashboard/assets/libs/filepond/filepond.min.js')}}"></script>
<script src="{{asset_url('dashboard/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')}}"></script>
<script src="{{asset_url('dashboard/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')}}"></script>
<script src="{{asset_url('dashboard/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js')}}"></script>
<script src="{{asset_url('dashboard/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js')}}"></script>

<!-- Sweet Alerts js -->
<script src="{{asset_url('dashboard/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<!-- ckeditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    // FilePond
    FilePond.registerPlugin(
        // encodes the file as base64 data
        FilePondPluginFileEncode,
        // validates the size of the file
        FilePondPluginFileValidateSize,
        // corrects mobile image orientation
        FilePondPluginImageExifOrientation,
        // previews dropped images
        FilePondPluginImagePreview
    );

    var inputMultipleElements = document.querySelectorAll('input.filepond-input-multiple');
    
    if(inputMultipleElements){

        // loop over input elements
        Array.from(inputMultipleElements).forEach(function (inputElement) {
            // create a FilePond instance at the input element location
            FilePond.create(inputElement);
        })

        FilePond.create(
            document.querySelector('.filepond-input-circle'), {
                labelIdle: 'Drag & Drop your picture or <span class="filepond--label-action">Browse</span>',
                imagePreviewHeight: 170,
                imageCropAspectRatio: '1:1',
                imageResizeTargetWidth: 200,
                imageResizeTargetHeight: 200,
                stylePanelLayout: 'compact circle',
                styleLoadIndicatorPosition: 'center bottom',
                styleProgressIndicatorPosition: 'right bottom',
                styleButtonRemoveItemPosition: 'left bottom',
                styleButtonProcessItemPosition: 'right bottom',
            }
        );
    }


    @if(session('success'))

        Swal.fire({
            html: '<div class="mt-3">' +
                '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
                '<div class="mt-4 pt-2 fs-15">' +
                '<h4>Well done !</h4>' +
                '<p class="text-muted mx-4 mb-0">New Workshop is created successfully!</p>' +
                '</div>' +
                '</div>',
            showConfirmButton: false,
            buttonsStyling: false,
            showCloseButton: true,
            timer: 2000,
        })

    @endif


    // ckeditor

    ClassicEditor.create( document.querySelector( '#description' ) ).catch( error => {console.error( error );} );

    ClassicEditor.create( document.querySelector( '#learning_outcomes' ) ).catch( error => {console.error( error );} );

</script>

@endsection


