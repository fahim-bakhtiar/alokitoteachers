@extends('admin.layouts.base')

@section('style')
    <link rel="stylesheet" href="{{asset_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection


@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-12 mb-4">

            <div class="p-3" style="background-color:#e1e1e1">

                <a href="{{route('resource-management.lessonplan.index')}}" class="btn btn-primary btn-lg mr-1"> <i class="fas fa-columns mr-1"></i> Main</a>

            </div>

        </div>

        <div class="col-12">

        <div class="card">

            <div class="card-header">

                <div class="d-flex justify-content-between">

                    <div>
                        <span class="badge badge-warning px-4 py-2 mr-2">Lesson Plan :</span>  <span>{{$lessonplan->title}}</span>
                        
                    </div>

                    <div>
                        <a href="{{route('resource-management.lesson.create', $lessonplan->id)}}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle mr-1"></i> Add Lesson</a>
                        <a href="{{route('resource-management.lesson.sequence.set', $lessonplan->id)}}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle mr-1"></i> Lesson Sequence</a>
                        <a href="{{route('resource-management.lessonplan.list')}}" class="btn btn-primary btn-sm"><i class="fas fa-list mr-1"></i> Lesson Plans</a>
                    </div>

                </div>
            </div>

            
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                    <tr class="bg-dark">
                        <th>ক্লাসের অংশ</th>
                        <th>সময় (মিনিটে)</th>
                        <th>এক্টিভিটি</th>
                        <th>মেথড</th>
                        <th>উপকরণ </th>
                        <th>Sequence </th>
                        <th>রিফ্লেকশন</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lessons as $lesson)
                        <tr>
                            
                            <td>{{$lesson->segment}}</td>
                            <td>{{$lesson->duration}}</td>
                            <td>{!!$lesson->activity!!}</td>
                            <td>{{$lesson->method}}</td>
                            <td>{!!$lesson->tools!!}</td>
                            <td>{{$lesson->sequence}}</td>
                            <td >{!!$lesson->reflection!!}</td>
                            <td style="width:10%">
                                <div class="btn-group w-100">
                                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-th-list mr-1"></i> Select</button>
                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon btn-sm" data-toggle="dropdown" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu" style="">
                                        <a class="dropdown-item" href="{{route('resource-management.lesson.edit', $lesson->id)}}"><i class="far fa-edit mr-2"></i> Edit</a>
                                        <a class="dropdown-item" href="{{route('resource-management.lesson.delete', $lesson->id)}}"><i class="far fa-edit mr-2"></i> Delete</a>
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


@endsection


@section('script02')

    


    <script>

        @if(session('success'))

        $(function() {
            toastr.success({{ Js::from(session('success')) }});
        });

        @endif

        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false, "searching": true,
            "ordering": true, "paging": true, "pageLength" : 10,
        })

    </script>

@endsection