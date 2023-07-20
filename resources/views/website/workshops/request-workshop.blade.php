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

<section class="profile">
    <div class="container">

        <div class="row g-5 flex-column-reverse flex-lg-row">
            <div class="col-lg-12">
                <div class="monthly-summery">
                    <div class="profile-header d-flex align-items-center mb-40">
                        <div class="d-flex align-items-center">
                            <img src="{{asset_url('website/assets/images/icons/idea.png')}}" alt="calender">
                            <h3 class="fw-400 mb-0">Workshop Request</h3>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">

                            <form action="{{ route('website.workshops.workshop-request-store') }}" method="post">

                                @csrf

                                <div class="row">

                                    <div class="col-12">

                                        <div class="form-group mb-4 @error('name') ? form-error : '' @enderror">

                                            <label for="name" class="fw-500 mb-2">Name*</label>

                                            <input id="name" type="text" name="name" class="form-control"  value="{{ old('name') ? old('name') : '' }}" placeholder="Name"/>
                                            
                                            @error('name')
                                                <span class="text-danger error-message mt-2">{{$message}}</span>
                                            @enderror
                                            
                                        </div>
                                        
                                    </div>

                                    <div class="col-12">

                                        <div class="form-group mb-4 @error('email') ? form-error : '' @enderror">

                                            <label for="email" class="fw-500 mb-2">Email*</label>

                                            <input id="email" type="text" name="email" class="form-control"  value="{{ old('email') ? old('email') : '' }}" placeholder="Email"/>
                                            
                                            @error('email')
                                                <span class="text-danger error-message mt-2">{{$message}}</span>
                                            @enderror
                                            
                                        </div>
                                        
                                    </div>

                                    <div class="col-12">

                                        <div class="form-group mb-4 @error('phone') ? form-error : '' @enderror">

                                            <label for="phone" class="fw-500 mb-2">Phone*</label>

                                            <input id="phone" type="number" name="phone" class="form-control"  value="{{ old('phone') ? old('phone') : '' }}" placeholder="(+88)"/>
                                            
                                            @error('phone')
                                                <span class="text-danger error-message mt-2">{{$message}}</span>
                                            @enderror
                                            
                                        </div>
                                        
                                    </div>

                                    <div class="col-12">

                                        <div class="form-group mb-4 @error('organization') ? form-error : '' @enderror">

                                            <label for="organization" class="fw-500 mb-2">Organization*</label>

                                            <input id="organization" type="text" name="organization" class="form-control"  value="{{ old('organization') ? old('organization') : '' }}" placeholder="Organization"/>
                                            
                                            @error('organization')
                                                <span class="text-danger error-message mt-2">{{$message}}</span>
                                            @enderror
                                            
                                        </div>
                                        
                                    </div>

                                    <div class="col-12">

                                        <div class="form-group mb-4 @error('request_details') ? form-error : '' @enderror">

                                            <label for="request_details" class="fw-500 mb-2">Request Details*</label>

                                            <textarea class="form-control" name="request_details" id="request_details" placeholder="Request Details">
                                                {{ old('request_details') ? old('request_details') : '' }}
                                            </textarea>
                                            
                                            @error('request_details')
                                                <span class="text-danger error-message mt-2">{{$message}}</span>
                                            @enderror

                                        </div>
                                        
                                    </div>

                                    

                                    <div class="col-12">

                                        <div class="btn-default-wrapper" style="text-align: right;">
                                            <button type="submit" class="btn-default">Submit</button>
                                        </div>

                                    </div>

                                </div>

                                

                            </form>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- Profile section end here -->

@endsection


@section('js01')


<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>


<script>

    $(function() {




        ClassicEditor
                .create( document.querySelector( '#request_details' ) )
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

<!-- For File Upload Component -->
<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
        
            var reader = new FileReader();
        
            reader.onload = function(e) {
            $('.image-upload-wrap').hide();
        
            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();
        
            $('.image-title').html(input.files[0].name);
            };
        
            reader.readAsDataURL(input.files[0]);
        
        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }

    $('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
    });

</script>

@endsection