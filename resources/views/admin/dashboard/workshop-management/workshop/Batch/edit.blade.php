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

                <h4 class="mb-sm-0"> Workshop : {{$batch->workshop->name}}  </h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="{{route('workshop-management.workshop.index')}}">Workshops</a></li>

                        <li class="breadcrumb-item"><a href="{{route('workshop-management.batch.list', $batch->workshop->id)}}">Batch List</a></li>

                        <li class="breadcrumb-item active">Edit Batch</li>

                    </ol>

                </div>

            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-12">
            
            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">Edit Batch</h3>

                </div>

                <form method="POST" action="{{ route('workshop-management.batch.edit', $batch->id) }}" enctype="multipart/form-data">

                    @csrf
                    
                    <input type="hidden" name="batch_id" value="{{$batch->id}}" id="">

                    <div class="card-body">

                        <div class="row">

                            <div class="col">

                                <div class="form-group">

                                    <label for="name">Name*</label>

                                    <input type="text" name="name" value="{{old('name') ? old('name') : $batch->name}}" class="form-control" id="name" placeholder="Enter name">

                                    @error('name') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">

                                    <label for="name">Registration Limit*</label>

                                    <input type="number" name="limit" class="form-control" id="limit" value="{{old('limit') ? old('limit') : $batch->limit}}" placeholder="Enter registration limit">

                                    @error('limit') <span class="text-danger d-block mt-2">{{ $message }}</span> @enderror

                                </div>

                            </div>
                            

                        </div>


                        <div class="row mt-3">

                            <div class="col mb-3">

                                <label for="">Start Date*</label>

                                <div class="input-group date" id="start_date" data-target-input="nearest">

                                    <input type="text" class="form-control" name="start_date" data-provider="flatpickr" value="{{old('start_date') ? date('d M, Y', strtotime(old('start_date'))) : date('d M, Y', strtotime($batch->start_date))}}" data-date-format="d M, Y" >

                                    <span class="input-group-text" id="basic-addon1"> <i class="bx bx-calendar fs-20"></i> </span>
                                    
                                </div>

                            </div>

                            <div class="col mb-3">

                                <label for="">End Date*</label>

                                <div class="input-group date" id="end_date" data-target-input="nearest">

                                    <input type="text" class="form-control" name="end_date" data-provider="flatpickr" value="{{old('end_date') ? date('d M, Y', strtotime(old('end_date'))) : date('d M, Y', strtotime($batch->end_date))}}" data-date-format="d M, Y" >

                                    <span class="input-group-text" id="basic-addon1"> <i class="bx bx-calendar fs-20"></i> </span>
                                    
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
                '<p class="text-muted mx-4 mb-0">Batch is updated successfully!</p>' +
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


