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
            <div class="col-lg-8">
                <div class="monthly-summery">
                    <div class="profile-header d-flex align-items-center mb-40">
                        <div class="d-flex align-items-center">
                            <img src="{{asset_url('website/assets/images/icons/idea.png')}}" alt="calender">
                            <h3 class="fw-400 mb-0">CREATE INNOVATION</h3>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">

                            <form action="{{ route('teacher.innovation.store') }}" method="post" enctype="multipart/form-data">

                                @csrf

                                <div class="row">

                                    <div class="col-12">

                                        <div class="form-group mb-4 @error('title') ? form-error : '' @enderror">

                                            <label for="title" class="fw-500 mb-2">INNOVATION TITLE</label>

                                            <input id="title" type="text" name="title" class="form-control"  value="{{ old('title') ? old('title') : '' }}" placeholder="Innovation Title"/>
                                            
                                            @error('title')
                                                <span class="text-danger error-message mt-2">{{$message}}</span>
                                            @enderror
                                            
                                        </div>
                                        
                                    </div>

                                    <div class="col-12">

                                        <div class="form-group mb-4 @error('description') ? form-error : '' @enderror">

                                            <label for="description" class="fw-500 mb-2">INNOVATION DESCRIPTION</label>

                                            <textarea class="form-control" name="description" id="description" placeholder="Innovation Description">
                                                {{ old('description') ? old('description') : '' }}
                                            </textarea>
                                            
                                            @error('description')
                                                <span class="text-danger error-message mt-2">{{$message}}</span>
                                            @enderror

                                        </div>
                                        
                                    </div>

                                    <div class="col-12">

                                        <div class="form-group mb-4 @error('price') ? form-error : '' @enderror">

                                            <label for="title" class="fw-500 mb-2">INNOVATION PRICE</label>

                                            <input id="price" type="number" name="price" class="form-control"  value="{{ old('price') ? old('price') : '' }}" placeholder="Innovation price"/>

                                            @error('price')
                                                <span class="text-danger error-message mt-2">{{$message}}</span>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <span>
                                            <i style="font-size: 14px;">**The thumbnail size should be less than 500KB and dimention should be 800px X 800px (width = 800px, height = 800px).</i>
                                            <div></div>
                                            <i style="margin: 5px 0 0;font-size: 14px;">* For resizing your image visit here <a href="https://resizepic.com/" target="_blank" class="text-yellow">https://resizepic.com/</a></i>
                                        </span>

                                        <div class="file-upload">
                                            <div class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">UPLOAD THUMBNAIL</div>

                                            <div class="image-upload-wrap">
                                                <input class="file-upload-input" name="thumbnail" type='file' onchange="readURL(this);" accept="image/*" />
                                                <div class="drag-text">
                                                <h3>Drag and drop a file or select add Image</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content">
                                                <img class="file-upload-image" src="#" alt="your image" />
                                                <div class="image-title-wrap">
                                                <div type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Thumbnail</span></div>
                                                </div>
                                            </div>

                                            @error('thumbnail')
                                                <span class="text-danger error-message mt-2">{{$message}}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    

                                    <div class="col-12">

                                        <div class="btn-default-wrapper" style="text-align: right;">
                                            <button type="submit" class="btn-default">Create</button>
                                        </div>

                                    </div>

                                </div>

                                

                            </form>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            @include('teacher.includes.sidebar')
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
                .create( document.querySelector( '#description' ) )
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