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

                <h4 class="mb-sm-0">Edit Teacher  </h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="{{route('user-management.teacher.list')}}">List Teacher</a></li>

                        <li class="breadcrumb-item active">Edit Teacher</li>

                    </ol>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-12">
            
          <div class="card">

            <div class="card-body">

                <form method="post" action="{{route('user-management.teacher.edit', $teacher->id)}}" enctype=multipart/form-data>

                    @csrf

                    
                    <div class="card-body">

                        <div class="row">
                            
                            <div class="col-12 mb-5">

                                <img class="img-fluid rounded-circle shadow-lg mr-2" style="width:50px" src="{{$teacher->getAbsoluteProfileImagePath()}}" alt="">

                            </div>

                            <div class="col-12"> <h4> Basic Informations</h4></div>

                        </div>

                        <hr>

                        <div class="form-box">

                            <div class="row">

                                <div class="col mb-3">
                                    
                                    <div class="form-group">

                                        <label for="" class="form-label">First Name*</label>

                                        <input type="text" name="first_name" value="{{old('first_name') ? old('first_name') : $teacher->first_name}}" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="" placeholder="First name">

                                        @error('first_name') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                    </div>
                                    
                                </div>

                                <div class="col mb-3">

                                    <div class="form-group">

                                        <label for="">Last Name*</label>

                                        <input type="text" name="last_name" value="{{old('last_name') ? old('last_name') : $teacher->last_name}}" id="" placeholder="Last name" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}">

                                        @error('last_name') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                    </div>

                                </div>

                            

                                <div class="col mb-3">
                                    
                                    <label for="exampleInputEmail1">Email address*</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <div class="input-group-text"><i class="bx bx-envelope fs-20"></i></div>

                                        </div>

                                        <input type="email" name="email" value="{{old('email') ? old('email') : $teacher->email}}"  class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter email" >
                                        

                                    </div>

                                    @error('email') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                                <div class="col mb-3">

                                    <label for="exampleInputEmail1">Phone*</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <div class="input-group-text"><i class="bx bx-phone fs-20"></i></div>

                                        </div>

                                        <input type="text" name="phone" value="{{old('phone') ? old('phone') : $teacher->phone}}"  class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Enter phone" >

                                    </div>

                                    @error('phone') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="row">

                                <div class="col mb-3">
                                    
                                    <label for="exampleInputEmail1">Gender</label>

                                    <div class="input-group">

                                        <select class="form-control" name="gender">

                                            <option value="null">Select</option>

                                            <option value="male" {{ old('gender') == 'male' || $teacher->gender == 'male' ? 'selected' : '' }} >Male</option>

                                            <option value="female" {{ old('gender') == 'female' || $teacher->gender == 'female' ? 'selected' : '' }}>Female</option>

                                        </select>

                                    </div>

                                </div>

                                <div class="col mb-3">

                                    <label for="">Date of Birth</label>

                                    <div class="input-group date" id="dob" data-target-input="nearest">

                                        <input type="text" class="form-control" name="dob" value="{{old('dob') ? date('d M, Y', strtotime(old('dob'))) : date('d M, Y', strtotime($teacher->dob))}}" data-provider="flatpickr" data-date-format="d M, Y">

                                        <span class="input-group-text" id="basic-addon1"> <i class="bx bx-calendar fs-20"></i> </span>
                                        
                                    </div>

                                </div>
                                
                                <div class="col mb-3">

                                    <label for="district" class="form-label text-muted">(Address) District</label>

                                    <select class="form-control" data-choices name="district" id="district">

                                        <option >Select</option>

                                        @foreach($districts as $district)

                                            <option value="{{$district->id}}" @if($teacher->district) {{ $teacher->district->id == $district->id ? 'selected' : '' }} @endif>{{$district->name}}</option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="col mb-3">

                                    <div class="form-group">

                                        <label for="">Full Address</label>

                                        <input type="text" name="full_address" value="{{old('full_address') ? old('full_address') : $teacher->full_address}}" class="form-control" id="" placeholder="Full Address">

                                    </div>

                                </div>

                            </div>

                        </div>

                        

                        <div class="row mt-5"><div class="col-12"> <h4><i class="fas fa-user-shield mr-2"></i> Account Informations</h4></div></div>

                        <hr>
                        
                        <div class="form-box">

                            <div class="row mt-3">

                                <div class="col mb-3">
                                    
                                    <label for="exampleInputEmail1" class="form-label">Username*</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <div class="input-group-text">@</div>

                                        </div>

                                        <input type="text" name="username" value="{{old('username') ? old('username') : $teacher->username}}"  class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"" id="exampleInputEmail1" placeholder="atuser13" >


                                    </div>

                                    @error('username') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                                <div class="col mb-3">

                                    <div class="form-group">

                                        <label for="exampleInputPassword1" class="form-label">Password*</label>

                                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Password" >

                                        @error('password') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                    </div>

                                </div>

                                <div class="col mb-3">

                                    <div class="form-group">

                                        <label for="exampleInputPassword2" class="form-label">Retype Password*</label>

                                        <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword2" placeholder="Retype Password">

                                    </div>

                                </div>


                            </div>

                            <div class="row">   

                                <div class="col-12 mb-3">

                                    <div class="form-group">

                                        <label class="form-label">Upload Profile image</label>

                                        <input type="file" class="filepond filepond-input-multiple" name="dp" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">

                                    </div>

                                    <br>
                                    @error('dp') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                                <div class="col mb-3">

                                    <label for="exampleInputEmail1">School Name</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <div class="input-group-text"><i class="bx bxs-school fs-20"></i></div>

                                        </div>

                                        <input type="text" name="school"  value="{{old('school') ? old('school') : $teacher->school}}"  class="form-control" id="exampleInputEmail1" placeholder="School Name" >

                                    </div>

                                </div>

                                <div class="col mb-3">

                                    <label for="exampleInputEmail1">School Address</label>

                                    <div class="input-group">

                                        <div class="input-group-prepend">

                                            <div class="input-group-text"><i class="bx bx-map-pin fs-20"></i></div>

                                        </div>

                                        <input type="text" name="school_address" value="{{old('school_address') ? old('school_address') : $teacher->school_address}}"  class="form-control" id="exampleInputEmail1" placeholder="School Address" >

                                    </div>

                                </div>

                            </div>

                            <div class="row mt-3">

                                <div class="col mb-3">
                                    
                                    <label for="exampleInputEmail1" class="form-label">Years of Experience</label>

                                    <div class="input-group">

                                        <select class="form-control" name="experience">

                                            <option value="null">Select</option>

                                            <option value="0" {{ old('experience') == '0' || $teacher->experience == '0' ? 'selected' : '' }} > < 1 Year</option>
                                            <option value="1" {{ old('experience') == '1' || $teacher->experience == '1' ? 'selected' : '' }} > 1 Year</option>
                                            <option value="2" {{ old('experience') == '2' || $teacher->experience == '2' ? 'selected' : '' }} > 2 Years</option>
                                            <option value="3" {{ old('experience') == '3' || $teacher->experience == '3' ? 'selected' : '' }} > 3 Years</option>
                                            <option value="4" {{ old('experience') == '4' || $teacher->experience == '4' ? 'selected' : '' }} > 4 Years</option>
                                            <option value="5" {{ old('experience') == '5' || $teacher->experience == '5' ? 'selected' : '' }} > 5 Years</option>
                                            <option value="6" {{ old('experience') == '6' || $teacher->experience == '6' ? 'selected' : '' }} > 6 Years</option>
                                            <option value="7" {{ old('experience') == '7' || $teacher->experience == '7' ? 'selected' : '' }} > 7+ Years</option>

                                        </select>

                                    </div>

                                </div>

                                <div class="col mb-3">

                                    <label for="grades_teaching" class="form-label text-muted">Grades Teaching</label>

                                    <select class="form-control" id="grades_teaching" data-choices data-choices-removeItem name="grades_teaching[]" multiple>

                                        <option >Select</option>

                                        @foreach($grades as $grade)

                                            <option value="{{$grade->id}}" {{ in_array($grade->id, $teacher->grades_array()) ? 'selected' : '' }}>{{$grade->name}}</option>

                                        @endforeach

                                    </select>

                                </div>
                                
                                <div class="col mb-3">

                                    <label for="curriculum" class="form-label text-muted">Curriculum</label>

                                    <select class="form-control" data-choices name="curriculum" id="curriculum">

                                        <option value=null>Select</option>

                                        @foreach($mediums as $medium)

                                            <option value="{{$medium->id}}" {{ $medium->id == $teacher->curriculum()->category_id ? 'selected' : '' }}>{{$medium->name}}</option>

                                        @endforeach

                                    </select>

                                </div>
                                

                            </div>

                        </div>

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
                '<p class="text-muted mx-4 mb-0">Teacher is updated successfully!</p>' +
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




