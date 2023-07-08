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

                <h4 class="mb-sm-0">Create Admin User</h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item active">Create Admin</li>

                    </ol>

                </div>

            </div>
        </div>
    </div>



    <div class="row">

        <div class="col-12">
            
          <div class="card">

            <div class="card-body">

                <form method="post" action="{{route('admin.user-management.create')}}" enctype=multipart/form-data>

                    @csrf

                    <div class="card-body">

                        <div class="row mb-3">

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="" class="form-label">Name*</label>

                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="" placeholder="Enter name">

                                    @error('name') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="exampleInputEmail1" class="form-label">Email address*</label>

                                    <input type="email" name="email" value="{{old('email')}}"  class="form-control" id="exampleInputEmail1" placeholder="Enter email" >

                                    @error('email') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                        </div>

                        
                        <div class="row mb-3">

                            <div class="col-6">

                                <div class="form-group">

                                    <label for="exampleInputPassword1" class="form-label">Password*</label>

                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" >

                                    @error('password') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>


                            <div class="col-6">

                                <div class="form-group">

                                    <label for="exampleInputPassword2" class="form-label">Retype Password*</label>

                                    <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword2" placeholder="Retype Password">

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12">

                                <div class="form-group">

                                    <label class="form-label">Upload Profile image*</label>

                                    <input type="file" class="filepond filepond-input-multiple" name="image" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">

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
                '<p class="text-muted mx-4 mb-0">Admin user successfully created.</p>' +
                '</div>' +
                '</div>',
            showConfirmButton: false,
            buttonsStyling: false,
            showCloseButton: true,
            timer: 2000,
        })

    @endif

</script>

@endsection



