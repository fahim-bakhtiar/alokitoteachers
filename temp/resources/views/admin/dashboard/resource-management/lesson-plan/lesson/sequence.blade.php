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
                        <a href="{{route('resource-management.lesson.list', $lessonplan->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-list mr-1"></i> Lessons</a>
                    </div>

                </div>
            </div>

            
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                    <tr class="bg-dark">
                        <th>ক্লাসের অংশ</th>
                        <th>Sequence </th>
                    </tr>
                  </thead>
                  <tbody>
                  <form action="{{route('resource-management.lesson.sequence.update', $lessonplan->id)}}" method="post">
                    @csrf
                    @foreach($lessons as $lesson)
                        <tr>
                            
                            <td>{{$lesson->segment}}</td>
                            <td>
                                
                                <div class="form-row align-items-center">
                                    <div class="col-9">
                                        <div class="form-group">
                                            <input class="form-control" type="number" name="{{$lesson->id}}" value="{{$lesson->sequence}}">
                                        </div>
                                    </div>
                                    
                                </div>
                                    
                                
                            </td>
                        
                        </tr>
                    @endforeach
                        <tr>
                            <td colspan="2">
                                <div class="col-12 text-right">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-1"><i class="far fa-save mr-2"></i> Update</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </form>
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