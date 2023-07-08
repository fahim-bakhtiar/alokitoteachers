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

                <h4 class="mb-sm-0">Create Course  </h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item active">Create Course</li>

                    </ol>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-12">
            
          <div class="card">

            <div class="card-body">

                <form method="post" action="{{route('course-management.course.create')}}" enctype=multipart/form-data>

                    @csrf

                    <div class="card-body">

                        <div class="row mb-3">

                            <div class="col">

                                <div class="form-group">

                                    <label for="title">Course Title*</label>

                                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="Enter title">

                                    @error('title') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="price">Price*</label>

                                    <input type="number" name="price" value="{{old('price')}}"  class="form-control" id="price" placeholder="Enter price" >

                                    @error('price') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="sale_price">Sale Price</label>

                                    <input type="number" name="sale_price" value="{{old('sale_price')}}"  class="form-control" id="sale_price" placeholder="Enter Sale price" >

                                    @error('sale_price') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="certificate_price">Certificate Price*</label>

                                    <input type="number" name="certificate_price" value="{{old('certificate_price')}}"  class="form-control" id="certificate_price" placeholder="Enter Certificate price" >

                                    @error('certificate_price') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            
                            

                        </div>

                        <div class="row mb-3">

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="details">Course Details*</label>

                                    <textarea id="details" name="details"></textarea>

                                </div>

                            </div>

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="learning_objective">Learning Objective*</label>

                                    <textarea name="learning_objective" id="learning_objective"></textarea>

                                </div>

                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-12">
                                
                                <div class="form-group">

                                    <label for="exampleInputFile">Thumbnail</label>

                                         <input type="file" class="filepond filepond-input-multiple" name="thumbnail" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                                        
                                        <br>
                                        @error('thumbnail') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror


                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="preview_video form-label">Preview Video*</label>

                                    <input type="text" name="preview_video" value="{{old('preview_video')}}" class="form-control" id="title" placeholder="Preview Video URL">

                                    @error('preview_video') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                                <div class="form-group">

                                    <input type="hidden" name="status" value="inactive" class="form-control">

                                </div>

                            </div>

                            <div class="col mb-3">

                                <label for="categories" class="form-label">Categories</label>

                                <select class="form-control" id="categories" data-choices data-choices-removeItem name="categories[]" multiple>

                                    <option >Select</option>

                                    @foreach($categories as $category)

                                        <option value=@json(['id' => $category->id, 'type' => $category->type])>{{$category->name}}</option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col mb-3">

                                <label for="advisors" class="form-label">Select Course Advisors*</label>

                                <select class="form-control" id="advisors" data-choices data-choices-removeItem name="advisors[]" multiple required>

                                    @foreach($faculties as $faculty)

                                        <option value={{$faculty->id}}>
                                            {{$faculty->fullname()}}
                                        </option>

                                    @endforeach

                                </select>

                                @error('advisors') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                            </div>

                            <div class="col mb-3">

                                <label for="designers" class="form-label">Select Course Designers*</label>

                                <select class="form-control" id="designers" data-choices data-choices-removeItem name="designers[]" multiple required>

                                    @foreach($faculties as $faculty)

                                        <option value={{$faculty->id}}>{{$faculty->fullname()}}</option>

                                    @endforeach

                                </select>

                                @error('designers') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                            </div>

                            <div class="col mb-3">

                                <label for="facilitators" class="form-label">Select Course Facilitators*</label>

                                <select class="form-control" id="facilitators" data-choices data-choices-removeItem name="facilitators[]" multiple required>

                                    @foreach($faculties as $faculty)

                                        <option value={{$faculty->id}}>{{$faculty->fullname()}}</option>

                                    @endforeach

                                </select>

                                @error('facilitators') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

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
                '<p class="text-muted mx-4 mb-0">New Course is created successfully!</p>' +
                '</div>' +
                '</div>',
            showConfirmButton: false,
            buttonsStyling: false,
            showCloseButton: true,
            timer: 2000,
        })

    @endif


    // ckeditor

    ClassicEditor.create( document.querySelector( '#details' ) ).catch( error => {console.error( error );} );

    ClassicEditor.create( document.querySelector( '#learning_objective' ) ).catch( error => {console.error( error );} );

</script>

@endsection


