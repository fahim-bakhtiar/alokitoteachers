@extends('website.layouts.base')

@section('css01')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="{{asset_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

<style>
    .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable, .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
        min-height: 300px;
    }

</style>

@endsection


@section('page-content')
<section class="profile-edit-section">
    <form action="{{route('teacher.profile.edit')}}" method="post" class="profile-edit" enctype=multipart/form-data>
        @csrf
        <div class="profile-edit-header">
            <div class="container">
                <div class="profile-edit-header-inner">
                    <div>
                        <h2 class="mb-2">Your Profile</h2>
                        <p class="mb-0">Edit and save your profile information</p>
                    </div>
                    <div class="btn-default-wrapper">
                        <button type="submit" class="btn-default">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="edit-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 offset-lg-1">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="edit-card">
                                    <div class="card-header d-flex align-items-center">
                                        <img src="{{asset_url('website/assets/images/icons/photo.png')}}" alt="calender">
                                        <h3 class="fw-400 mb-0">Your Photo</h3>
                                    </div>
                                    <div class="avatar-upload d-flex align-items-center">
                                        <div class="avatar-preview">
                                            <div id="imagePreview"
                                                @if(!$logged_in_teacher->dp) 
                                                style="background-image: url({{asset_url('website/assets/images/empty.jpg')}});"
                                                @else
                                                style="background-image: url({{asset_url('storage/images')}}/{{$logged_in_teacher->dp}});"
                                                @endif
                                            ></div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" name="dp" accept=".png, .jpg, .jpeg"/>
                                            <label for="imageUpload" class="btn-default btn-secondary mb-20">Upload photo</label>
                                            <div class="remove-image d-flex align-items-center">
                                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <mask id="mask0_1104_7651" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="25">
                                                        <rect y="0.5" width="24" height="24" fill="#D9D9D9"/>
                                                    </mask>
                                                    <g mask="url(#mask0_1104_7651)">
                                                        <path d="M9.4 17L12 14.4L14.6 17L16 15.6L13.4 13L16 10.4L14.6 9L12 11.6L9.4 9L8 10.4L10.6 13L8 15.6L9.4 17ZM7 21.5C6.45 21.5 5.97933 21.3043 5.588 20.913C5.196 20.521 5 20.05 5 19.5V6.5H4V4.5H9V3.5H15V4.5H20V6.5H19V19.5C19 20.05 18.8043 20.521 18.413 20.913C18.021 21.3043 17.55 21.5 17 21.5H7ZM17 6.5H7V19.5H17V6.5Z"
                                                              fill="#F29C1F"/>
                                                    </g>
                                                </svg>
                                                Remove Photo
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="edit-card">
                                    <div class="card-header d-flex align-items-center">
                                        <img src="{{asset_url('website/assets/images/icons/user.png')}}" alt="calender">
                                        <h3 class="fw-400 mb-0">Personal information</h3>
                                    </div>
                                    <div class="form-group mb-4 @error('first_name') ? form-error : '' @enderror">
                                        <label for="first_name" class="fw-500">FIRST NAME</label>
                                        <input id="firstname" type="text" name="first_name" class="form-control" 
                                            value="{{ old('first_name') ? old('first_name') : (!empty($logged_in_teacher->first_name) ? $logged_in_teacher->first_name : '') }}" 
                                            placeholder="Your first name"/>
                                        
                                        @error('first_name')
                                        <span class="error-message mt-2">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="last_name" class="fw-500">LAST NAME</label>
                                        <input id="last_name" type="text" name="last_name" class="form-control" value="{{$logged_in_teacher->last_name}}" placeholder="Your last name"/>
                                        
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="gender" class="fw-500">GENDER</label>
                                        <select name="gender" id="gender" class="form-select @error('gender') ? form-error : '' @enderror" required>
                                            <option value="male" @if(old('gender') == 'male') selected @elseif($logged_in_teacher->gender == 'male') selected @endif>Male</option>
                                            <option value="female" @if(old('gender') == 'female') selected @elseif($logged_in_teacher->gender == 'female') selected @endif>Female</option>
                                        </select>
                                        @error('gender')
                                        <span class="error-message mt-2">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4 @error('dob') ? form-error : '' @enderror">
                                        <label for="dob" class="fw-500">DATE OF BIRTH</label>
                                        <div class="input-group date" id="dob" data-target-input="nearest">

                                            <input type="text" name="dob" class="form-control datetimepicker-input"
                                                @if(old('dob'))
                                                    value="{{old('dob')}}" 
                                                @elseif($logged_in_teacher->dob == null)
                                                    value=""    
                                                @else 
                                                    value="{{date('d/m/Y', strtotime($logged_in_teacher->dob))}}" 
                                                @endif
                                                data-target="#dob">

                                            <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">

                                                <div class="input-group-text" style="font-size: 37px;border-radius: 0;border-top-right-radius: 10px;border-bottom-right-radius: 10px;"><i class="fa fa-calendar"></i></div>

                                            </div>
                                        </div>
                                        @error('dob')
                                        <span class="error-message mt-2">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4 @error('phone') ? form-error : '' @enderror">
                                        <label for="phone" class="fw-500">PHONE NUMBER</label>
                                        <input id="phone" type="text" name="phone" class="form-control" value="{{ old('phone') ? old('phone') : (!empty($logged_in_teacher->phone) ? $logged_in_teacher->phone : '') }}" placeholder="your phone number"/>
                                        @error('phone')
                                        <span class="error-message mt-2">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4 @error('email') ? form-error : '' @enderror">
                                        <label for="email" class="fw-500">E-MAIL</label>
                                        <input id="email" type="email" name="email" class="form-control" value="{{ old('email') ? old('email') : (!empty($logged_in_teacher->email) ? $logged_in_teacher->email : '') }}"/>
                                        @error('email')
                                        <span class="error-message mt-2">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('username') ? form-error : '' @enderror">
                                        <label for="username" class="fw-500">USERNAME</label>
                                        <input id="username" type="text" name="username" class="form-control" value="{{ old('username') ? old('username') : (!empty($logged_in_teacher->username) ? $logged_in_teacher->username : '') }}" placeholder="create your username"/>
                                        @error('username')
                                        <span class="error-message mt-2">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4 mt-3 @error('district_id') ? form-error : '' @enderror">
                                        <label for="district_id" class="fw-500">HOME DISTRICT</label>
                                        <div class="col-lg-12 mb-30 mb-lg-0">
                                            <select name="district_id" id="district_id" title="District" class="selectpicker form-control">
                                                @foreach(all_districts() as $district)
                                                    <option value="{{$district->id}}" @if(old('district_id') == $district->id) selected @elseif($logged_in_teacher->district_id == $district->id) selected @endif>{{$district->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                            @error('district_id')
                                                <span class="error-message mt-2">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mb-4 mt-3">
                                        <label for="full_address" class="fw-500">HOME ADDRESS</label>
                                        <div class="col-lg-12 mb-30 mb-lg-0">
                                            <textarea class="form-control" name="full_address" id="full_address" cols="30" rows="10">{!! old('full_address') ? old('full_address') : (!empty($logged_in_teacher->full_address) ? $logged_in_teacher->full_address : '') !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="edit-card">
                                    <div class="card-header d-flex align-items-center">
                                        <img src="{{asset_url('website/assets/images/icons/building.png')}}" alt="calender">
                                        <h3 class="fw-400 mb-0">School Information</h3>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="school" class="fw-500">SCHOOL NAME</label>
                                        <input id="school" type="text" name="school" class="form-control" value="{{ old('school') ? old('school') : (!empty($logged_in_teacher->school) ? $logged_in_teacher->school : '') }}" placeholder="The school you teach in"/>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="school_address" class="fw-500">SCHOOL ADDRESS</label>
                                        <input id="school_address" type="text" name="school_address" class="form-control" value="{{ old('school_address') ? old('school_address') : (!empty($logged_in_teacher->school_address) ? $logged_in_teacher->school_address : '') }}" placeholder="Your school address"/>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="school_district" class="fw-500">SCHOOL DISTRICT</label>
                                        <div class="col-lg-12 mb-30 mb-lg-0">
                                            <select name="school_district" id="school_district" title="District" class="selectpicker form-control">
                                                @foreach(all_districts() as $district)
                                                    <option value="{{$district->id}}" @if(old('school_district') == $district->id) selected @elseif($logged_in_teacher->check_for_null_and_get_district_id() == $district->id) selected @endif>{{$district->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-30 mb-lg-0">
                                            <select name="school_grades[]" id="user_class" title="Grades you teach" class="selectpicker form-control" multiple>
                                                @foreach(all_grade_levels() as $grade)
                                                    <option value="{{$grade->id}}" @if(in_array($grade->id, $logged_in_teacher->get_classes_he_teaches())) selected @endif>{{$grade->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <select name="experience" id="experience" class="form-select">
                                                <option value="0" @if(old('experience') == 0) selected @elseif(!isset($logged_in_teacher->experience)) selected @endif>Teaching Experince</option>
                                                <option value="<1" @if(old('experience') == '<1') selected @elseif($logged_in_teacher->experience == '<1') selected @endif>< 1 Year</option>
                                                <option value="2" @if(old('experience') == '2') selected @elseif($logged_in_teacher->experience == '2') selected @endif>2 Year</option>
                                                <option value="3" @if(old('experience') == '3') selected @elseif($logged_in_teacher->experience == '3') selected @endif>3 Year</option>
                                                <option value="4" @if(old('experience') == '4') selected @elseif($logged_in_teacher->experience == '4') selected @endif>4 Year</option>
                                                <option value="5" @if(old('experience') == '5') selected @elseif($logged_in_teacher->experience == '5') selected @endif>5 Year</option>
                                                <option value="6" @if(old('experience') == '6') selected @elseif($logged_in_teacher->experience == '6') selected @endif>6 Year</option>
                                                <option value="7+" @if(old('experience') == '7+') selected @elseif($logged_in_teacher->experience == '7+') selected @endif>7+ Years</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <select name="curriculum" id="curriculum" class="form-select">
                                                <option value="" @if(old('curriculum') == '') selected @elseif($logged_in_teacher->curriculum == '') selected @endif>Curriculum</option>
                                                <option value="em" @if(old('curriculum') == 'em') selected @elseif($logged_in_teacher->curriculum == 'em') selected @endif>English Medium</option>
                                                <option value="bm" @if(old('curriculum') == 'bm') selected @elseif($logged_in_teacher->curriculum == 'bm') selected @endif>Bangla Medium</option> 
                                                <option value="madrasa" @if(old('curriculum') == 'madrasa') selected @elseif($logged_in_teacher->curriculum == 'madrasa') selected @endif>Madrasa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="edit-card">
                                    <div class="card-header d-flex align-items-center">
                                        <img src="{{asset_url('website/assets/images/icons/building.png')}}" alt="calender">
                                        <h3 class="fw-400 mb-0">Professional information</h3>
                                    </div>

                                    <div class="form-group mb-4 mt-3">
                                        <label for="qualifications" class="fw-500">ACADEMIC QUALIFICATIONS</label>
                                        <div class="col-lg-12 mb-30 mb-lg-0">
                                            <textarea class="form-control" name="qualifications" id="qualifications" cols="30" rows="10">
                                            {!! old('qualifications') ? old('qualifications') : (!empty($logged_in_teacher->qualifications) ? $logged_in_teacher->qualifications : '') !!}
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4 mt-3">
                                        <label for="work_history" class="fw-500">WORK EXPERIENCES</label>
                                        <div class="col-lg-12 mb-30 mb-lg-0">
                                            <textarea class="form-control" name="work_history" id="work_history" cols="30" rows="10">
                                            {!! old('work_history') ? old('work_history') : (!empty($logged_in_teacher->work_history) ? $logged_in_teacher->work_history : '') !!}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="edit-card">
                                    <div class="card-header d-flex align-items-center">
                                        <img src="{{asset_url('website/assets/images/icons/key.png')}}" alt="calender">
                                        <h3 class="fw-400 mb-0">Security</h3>
                                    </div>
                                    <div class="form-group mb-4 @error('password') ? form-error : '' @enderror">
                                        <label for="password" class="fw-500">CHANGE PASSWORD</label>
                                        <input id="password" type="password" name="password" class="form-control" placeholder="New password"/>
                                        @error('password')
                                            <span class="error-message mt-2">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('password') ? form-error : '' @enderror">
                                        <label for="confirm-password" class="fw-500">CONFIRM PASSWORD</label>
                                        <input id="confirm-password" type="password" name="password_confirmation" class="form-control" placeholder="Retype password"/>
                                        <!-- <span class="error-message mt-2">The password didn't match</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<!-- Profile edit section end here -->

@endsection

@section('js01')

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script src="{{asset_url('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>


@if(session('success'))

  <script>
    
    

  </script>

@endif



    

<script>

$(function() {


    //Date picker
    $('#dob').datetimepicker({
        format: 'L'
    });


    ClassicEditor
            .create( document.querySelector( '#qualifications' ) )
            .catch( error => {
                console.error( error );
            } );
    ClassicEditor
            .create( document.querySelector( '#work_history' ) )
            .catch( error => {
                console.error( error );
            } );

    @if(session('success'))

    $(function() {
      toastr.success({{ Js::from(session('success')) }});
    });

    @endif

    @if($errors->any())

    $(function() {
      toastr.error('One or more data was not valid. Please check.');
    });

    @endif

    

});

</script>

@endsection