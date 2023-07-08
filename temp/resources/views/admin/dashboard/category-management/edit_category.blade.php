@extends('admin.layouts.parent')


@section('css01')

<!-- Sweet Alert css-->
<link href="{{asset_url('dashboard/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')

    <div class="row">

        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <h4 class="mb-sm-0">Create Category  </h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="{{route('category-management.list')}}">Lest Category</a></li>

                        <li class="breadcrumb-item active">Create Category</li>

                    </ol>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-12">
            
          <div class="card">

            <div class="card-body">

                <form method="post" action="{{route('category-management.edit', $category->id)}}">

                    @csrf

                    <div class="card-body">

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="name">Category Name*</label>

                                    <input type="text" name="name" value="{{old('name') ? old('name') : $category->name}}" class="form-control" id="name" placeholder="Enter name" required>

                                    @error('name') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                
                                <div class="form-group">

                                    <label>Category Type</label>

                                    <select class="form-control select2" style="width: 100%;" name="type" required>

                                        <option value="grade_level" @if($category->type == 'grade') selected @endif>Grade</option>

                                        <option value="subject" @if($category->type == 'subject') selected @endif>Subject</option>

                                        <option value="book" @if($category->type == 'book') selected @endif>Book</option>

                                        <option value="medium" @if($category->type == 'medium') selected @endif>Medium</option>

                                        <option value="year" @if($category->type == 'year') selected @endif>Year</option>

                                        <option value="tag" @if($category->type == 'tag') selected @endif>Tag</option>

                                        <option value="other" @if($category->type == 'other') selected @endif>Other</option>

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

<!-- Sweet Alerts js -->
<script src="{{asset_url('dashboard/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<script>
    

    @if(session('success'))

        Swal.fire({
            html: '<div class="mt-3">' +
                '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
                '<div class="mt-4 pt-2 fs-15">' +
                '<h4>Well done !</h4>' +
                '<p class="text-muted mx-4 mb-0">Category is updated successfully!</p>' +
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


