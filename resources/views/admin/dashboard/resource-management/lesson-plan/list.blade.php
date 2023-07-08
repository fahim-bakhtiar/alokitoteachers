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

                <a href="{{route('resource-management.lessonplan.index')}}" class="btn btn-primary btn-lg mr-1"> <i class="fas fa-columns mr-1"></i> Main</a>

                <a href="{{route('resource-management.lessonplan.create')}}" class="btn btn-primary btn-lg"> <i class="fas fa-plus-circle mr-1"></i> Create</a>
                
            </div>

        </div>

        <div class="col-12">

        <div class="card">

            <div class="card-header">
                <div style="background-color: #f0f8ff;">
                    <form action="{{route('resource-management.lessonplan.search')}}" method="get">
                        
                        <table class="table filter-table" style="border-top:0px">
                            <tr>
                                <td width="30%">
                                    <label for="">Subject</label>
                                    <select class="form-control" name="subject" id="subject">
                                        <option value="0" selected>Select</option>
                                        @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                
                            
                                <td width="30%">
                                    <label for="">Grade</label>
                                    <select class="form-control" name="grade" id="grade">
                                        <option value="0" selected>Select</option>
                                        @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->name}}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td width="30%">
                                    <label for="">Price Range</label>
                                    <div class="row margin">
                                        <div class="col-sm-12">
                                            <input id="range_1" type="text" name="price" value="">
                                        </div>
                                    </div>
                                </td>
                            
                                
                                <td width="10%">
                                    <label for="" style="visibility:hidden">Action</label>
                                    <button type="submit" class="btn btn-block btn-success"><i class="fas fa-filter pr-1 pl-3"></i> Filter</button>
                                </td>
                            </tr>
                            
                        
                            
                        </table>
                    </form>
                </div>

            </div>

            
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                    <tr class="bg-dark">
                        <th>Title</th>
                        <th>Subject</th>
                        <th>Grade Level</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lesson_plans as $lessonplan)
                        <tr>
                            
                            <td>{{$lessonplan->title}}</td>
                            <td>{{$lessonplan->subject()->name}}</td>
                            <td>{{$lessonplan->grade_level()->name}}</td>
                            <td>BDT {{$lessonplan->price}}</td>
                            <td>
                                @if($lessonplan->status == 1)
                                    <i class="fas fa-check-circle" style="color:green"></i>
                                @else
                                    <i class="fas fa-ban" style="color:red"></i>
                                @endif
                            </td>
                            <td style="width:10%">
                                <div class="btn-group w-100">
                                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-th-list mr-1"></i> Select</button>
                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu" style="">
                                        <a class="dropdown-item" href="{{route('resource-management.lessonplan.edit', $lessonplan->id)}}"><i class="far fa-edit mr-2"></i> Edit</a>
                                        <a class="dropdown-item" href="{{route('resource-management.lesson.create', $lessonplan->id)}}"><i class="far fa-edit mr-2"></i> Add Lesson</a>
                                        <a class="dropdown-item" href="{{route('resource-management.lesson.list', $lessonplan->id)}}"><i class="far fa-edit mr-2"></i> List Lessons</a>
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