@extends('admin.layouts.base')


@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-12">
            
          <div class="card">

            <div class="card-body">

                <form method="post" action="{{route('admin.user-management.edit', $admin->id)}}" enctype=multipart/form-data>

                    @csrf

                    <div class="card-body">

                        <div class="form-group">

                            <label for="">Name*</label>

                            <input type="text" name="name" value="{{ old('name') ? old('name') : $admin->name }}" class="form-control" id="" placeholder="Enter name">

                            @error('name') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror
                            
                        </div>

                        <div class="form-group">

                            <label for="exampleInputEmail1">Email address*</label>

                            <input type="email" name="email" value="{{ old('email') ? old('email') : $admin->email }}"  class="form-control" id="exampleInputEmail1" placeholder="Enter email" >

                            @error('email') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                        </div>

                        <div class="form-group">

                            <label for="exampleInputPassword1">Password*</label>

                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" >

                            @error('password') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                        </div>

                        <div class="form-group">

                            <label for="exampleInputPassword2">Retype Password*</label>

                            <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword2" placeholder="Retype Password">

                        </div>

                        <div class="row">

                            <div class="col-1">

                                <img class="img-fluid rounded shadow-sm" id="dp" src="{{env('app_url')}}/storage/images/{{$admin->image}}" alt="">

                            </div>

                            <div class="col-11">
                                <div class="form-group">

                                <label for="exampleInputFile">Profile Image</label>

                                <div class="input-group">

                                    <div class="custom-file">

                                        <input type="file" name="image" class="custom-file-input" id="dp_upload">

                                        <label class="custom-file-label" for="exampleInputFile">Profile Image</label>

                                    </div>

                                    <br>

                                    @error('image') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

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

</div>

@endsection


@section('script01')

  @if(session('success'))

    <script>
        
        $(function() {

            toastr.success({{ Js::from(session('success')) }});

            $('#dp_upload').on('change',function(event){

                var image = document.getElementById('dp');

                image.src = URL.createObjectURL(event.target.files[0]);
                
            });

        });

        

    </script>

  @endif

  <script>

    $(function() {

        $('#dp_upload').on('change',function(event){

            var image = document.getElementById('dp');

            image.src = URL.createObjectURL(event.target.files[0]);
            
        });

    });

  </script>

@endsection


