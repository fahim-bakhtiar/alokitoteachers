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
                            <h3 class="fw-400 mb-0">Need Assessment Form</h3>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="need-form-box">
                                <form action="{{ route('need-assessment.store') }}" method="post">

                                @csrf

                                <div class="row">

                                    @foreach ($questions as $question)
                                        
                                        <div class="col-12">

                                            <div class="form-group mb-4">

                                                <label>{{ $loop->iteration }} . {{ $question->question }}</label>

                                                <div>
                                                    <input type="radio" name="question-{{ $question->id }}" value="strongly_disagree" style="cursor: pointer;" required> Strongly Disagree
                                                    <input type="radio" name="question-{{ $question->id }}" value="disagree" style="cursor: pointer;" required> Disagree
                                                    <input type="radio" name="question-{{ $question->id }}" value="neutral" style="cursor: pointer;" required> Neutral
                                                    <input type="radio" name="question-{{ $question->id }}" value="agree" style="cursor: pointer;" required> Agree
                                                    <input type="radio" name="question-{{ $question->id }}" value="strongly_agree" style="cursor: pointer;" required> Strongly Agree
                                                </div>

                                            </div>
                                            
                                        </div>

                                    @endforeach

                                    
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