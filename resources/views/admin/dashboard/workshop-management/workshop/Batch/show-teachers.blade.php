@extends('admin.layouts.parent')

@section('css01')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{asset_url('dashboard/assets/libs/gridjs/theme/mermaid.min.css')}}">

@endsection

@section('content')



    <div class="row">

        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <h4 class="mb-sm-0">Teachers <span class="text-muted">(Batch: {{ $batch->name }})</span></h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="{{route('workshop-management.workshop.index')}}">Workshop List</a></li>

                        <li class="breadcrumb-item"><a href="{{route('workshop-management.batch.list', $batch->workshop_id)}}">Batch List</a></li>

                        <li class="breadcrumb-item active">Teachers</li>

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
        columns: [{
                name: 'ID',
                width: '50px',
                formatter: (function (cell) {
                    return gridjs.html('<span class="fw-semibold">' + cell + '</span>');
                })
            },
            {
                name: 'Name',
                data: (function (row) {

                    return gridjs.html(`<span>${row.name}</span>`);
                    
                })
            },
            {
                name: 'Email',
                data: (function (row) {

                    return gridjs.html(`<span>${row.email}</span>`);
                    
                })
            },
            {
                name: 'Phone',
                data: (function (row) {

                    return gridjs.html(`<span>${row.phone}</span>`);
                    
                })
            },
            // {
            //     name: 'Activation Status',
            //     data: (function (row) {
                    
            //         if(row.status == 'inactive')

            //             return gridjs.html(`<span"><i class="bx bx-block fs-20"></i></span>`);

            //         if(row.status == 'active')

            //             return gridjs.html(`<span"><i class="bx bxs-check-circle fs-20"></i></span>`);
                    
            //     })
            // },
            // {
            //     name: 'Actions',
            //     data: (function (row) {

            //         return gridjs.html(`

            //             <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Select</button>
            //             <ul class="dropdown-menu">
            //                 <li><a class="dropdown-item" href="${row.edit_link}">Edit</a></li>
            //                 <li><a class="dropdown-item" href="${row.status_change_link}">Change Status</a></li>
            //             </ul>
                    
            //         `);
            //     })
            // },
        ],
        pagination: {
            limit: 10
        },
        sort: true,
        search: true,
        data: @json($teachers->toArray())
    }).render(document.getElementById("table-gridjs"));


</script>

@endsection