@extends('admin.layouts.parent')

@section('css01')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{asset_url('dashboard/assets/libs/gridjs/theme/mermaid.min.css')}}">

@endsection

@section('content')

    <div class="row">

        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <h4 class="mb-sm-0">List Activists  </h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item active">List Activists</li>

                    </ol>

                </div>

            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div id="table-gridjs"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->



@endsection


@section('js02')

<!-- gridjs js -->
<script src="{{asset_url('dashboard/assets/libs/gridjs/gridjs.umd.js')}}"></script>



<script>

if (document.getElementById("table-gridjs"))
    new gridjs.Grid({
        columns: [
            {
                name: 'Profile Picture',
                width: '150px',
                data: (function (row) {  
                        return gridjs.html(`<img class="img-fluid rounded-circle" style="width:50px;" src = "${row.profile_image}">`);
                })
            },
            {
                name: 'Name',
                width: '150px',
                data: (function (row) {

                    if(row.last_name != null)

                        return gridjs.html(row.first_name + ' ' + row.last_name);

                    else    
                        return gridjs.html(row.first_name);
                })
            },

            {
                name: 'Actions',
                width: '150px',
                data: (function (row) {

                    return gridjs.html(`

                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Select</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="${row.edit_link}">Edit</a></li>
                        </ul>
                    
                    `);
                })
            },
        ],
        pagination: {
            limit: 20
        },
        sort: true,
        search: true,
        data: @json($faculties->toArray())
    }).render(document.getElementById("table-gridjs"));


</script>

@endsection
