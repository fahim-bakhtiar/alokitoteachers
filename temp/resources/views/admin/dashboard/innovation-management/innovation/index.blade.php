@extends('admin.layouts.base')

@section('style')
    <link rel="stylesheet" href="{{asset_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset_url('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Ion Slider -->
    <link rel="stylesheet" href="{{asset_url('plugins/ion-rangeslider/css/ion.rangeSlider.min.css')}}">
      <!-- Ion Slider -->
    <link rel="stylesheet" href="{{asset_url('plugins/ion-rangeslider/css/ion.rangeSlider.min.css')}}">

    
    <style>
        .note-editor.note-airframe .note-editing-area .note-editable, .note-editor.note-frame .note-editing-area .note-editable {
            min-height: 344px;
        }

        .select2-container--default .select2-selection--single {
            height: 38px;
        }

        .select2-container {
            width: 100%!important;
        }
         .filter-table td, .filter-table th {
            border-top: 0px;
        }
</style>
@endsection


@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">Innovations</h3>

                </div>


                <div class="card-body">

                    <form action="{{ route('innovation-management.innovation.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Teachers</label>
                                    <select name="teacher_id" class="form-control select2bs4" style="width: 100%;">
    
                                        <option value="" selected>All</option>
                                        
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" {{ empty($request->teacher_id) ? "" : $teacher->id == $request->teacher_id ? "selected" : "" }}>{{ $teacher->first_name . " " . $teacher->last_name }}</option>
                                        @endforeach
    
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" class="form-control" value="{{ empty($request->start_date) ? "" : date_format(date_create($request->start_date), "Y-m-d") }}">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" name="end_date" class="form-control" value="{{ empty($request->end_date) ? "" : date_format(date_create($request->end_date), "Y-m-d") }}">
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-info btn-flat btn-sm"><i class="fa fa-filter"></i> Filter</button>

                    </form>

                </div>

                
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr class="bg-dark">
                                <th>#</th>
                                <th>Title</th>
                                <th>Teacher</th>
                                <th>Price</th>
                                <th>Thumbnail</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($innovations as $innovation)
                                <tr>
                                    
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $innovation->title }}</td>
                                    <td>{{ $innovation->teacher->first_name . " " . $innovation->teacher->last_name }}</td>
                                    <td>{{ $innovation->price }}</td>
                                    <td>
                                        <img class="img-responsive" style="width:40px; border-radius:10%" src="{{ $innovation->getAbsoluteThumbnailPath() }}" alt="">
                                    </td>
                                    <td>{{ date_format(date_create($innovation->created_at), "d/M/y") }}</td>
                                    <td>
                                        @if($innovation->status == "approved")
                                            <span class="text-success text-bold">{{ $innovation->status }}</span>
                                        @else
                                            <span class="text-danger text-bold">{{ $innovation->status }}</span>
                                        @endif
                                    </td>
                                    
                                    

                                    <td style="width: 5%;">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>

                                            {{-- THE FOLLOWING IS FOR SPLIT BUTTON DROPDOWN --}}
                                            {{-- <button type="button" class="btn btn-info btn-sm">Action</button>
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button> --}}

                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                <a class="dropdown-item" href="{{ route('innovation-management.innovation.show', $innovation->id) }}">View</a>
                                                <a class="dropdown-item" href="{{ route('innovation-management.innovation.change-status', $innovation->id) }}">Change Status</a>
                                            </div>
                                        </div>
                                    </td>
                                
                                </tr>
                            @endforeach
                        </tbody>
                    
                    </table>

                    
                    
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>

    </div>

</div>

@endsection


@section('script01')

<!-- DataTables  & Plugins -->
<script src="{{asset_url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset_url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset_url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset_url('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset_url('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset_url('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset_url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset_url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset_url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset_url('plugins/select2/js/select2.full.min.js')}}"></script>

<!-- Ion Slider -->
<script src="{{asset_url('plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!-- Ion Slider -->
<script src="{{asset_url('plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>

@endsection


@section('script02')

    @if(session('success'))

    <script>
        
        $(function() {

            toastr.success({{ Js::from(session('success')) }});

        });

    </script>

  @endif

    <script>

        $('#subject').select2();

        

        $('#range_1').ionRangeSlider({
            min     : 0,
            max     : 1000,
            from    : 0,
            to      : 1000,
            type    : 'double',
            step    : 10,
            postfix  : ' BDT',
            prettify: false,
            hasGrid : true
        });

        $('#grade').select2();

        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false, "searching": true,
            "ordering": true, "paging": true, "pageLength" : 10,
        })

        $('.select2').select2();

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

    </script>

@endsection