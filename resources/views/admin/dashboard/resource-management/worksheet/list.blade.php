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

        <div class="col-12 mb-4">

            <div class="p-3" style="background-color:#e1e1e1">

                <a href="{{route('resource-management.worksheet.index')}}" class="btn btn-primary btn-lg mr-1"> <i class="fas fa-columns mr-1"></i> Main</a>

                <a href="{{route('resource-management.worksheet.create')}}" class="btn btn-primary btn-lg"> <i class="fas fa-plus-circle mr-1"></i> Create</a>

            </div>

        </div>

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">Worksheets</h3>

                </div>

                
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr class="bg-dark">
                                <th>#</th>
                                <th>Title</th>
                                <th>Class/Grade</th>
                                <th>Subject</th>
                                <th>Worksheet File</th>
                                <th>Price</th>
                                <th>Sale Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($worksheets as $worksheet)
                                <tr>
                                    
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $worksheet->title }}</td>
                                    <td>{{ $worksheet->classCategory->name }}</td>
                                    <td>{{ $worksheet->subjectCategory->name }}</td>
                                    <td>
                                        <a class="btn-secondary btn-xs" href="{{ $worksheet->getAbsoluteFilePath() }}" target="_blank">{{ $worksheet->file_name }}</a>
                                    </td>
                                    <td>{{ $worksheet->price }}</td>
                                    <td>{{ $worksheet->sale_price }}</td>
                                    <td>
                                        @if($worksheet->status == "active")
                                            <span class="text-success text-bold">{{ $worksheet->status }}</span>
                                        @else
                                            <span class="text-danger text-bold">{{ $worksheet->status }}</span>
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
                                                <a class="dropdown-item" href="{{ route('resource-management.worksheet.edit', $worksheet->id) }}">Edit</a>
                                                <a class="dropdown-item" href="{{ route('resource-management.worksheet.change-status', $worksheet->id) }}">Change Status</a>
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

    </script>

@endsection