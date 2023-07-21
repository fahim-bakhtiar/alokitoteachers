@extends('admin.layouts.parent')

@section('css01')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{asset_url('dashboard/assets/libs/gridjs/theme/mermaid.min.css')}}">

    <!-- Sweet Alert css-->
    <link href="{{asset_url('dashboard/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')



    <div class="row">

        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <h4 class="mb-sm-0">Batch List <span class="text-muted">(Workshop: {{$batches[0]->workshop->name}})</span></h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="{{route('workshop-management.workshop.index')}}">Workshop List</a></li>

                        <li class="breadcrumb-item active">Batch List</li>

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

<!-- Sweet Alerts js -->
<script src="{{asset_url('dashboard/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

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
                name: 'Batch Name',
                width: '300px',
                data: (function (row) {

                    return gridjs.html(`<div class="d-flex justify-content-between"> <p style="padding-left:10px">${row.name}</p></div>`);
                })
            },
            {
                name: 'Registration Limit',
                data: (function (row) {

                    return gridjs.html(`<span">${row.limit}</span>`);
                    
                })
            },
            
            {
                name: 'Starting Date',
                data: (function (row) {

                    return gridjs.html(`<span">${row.start_date}</span>`);
                    
                })
            },

            {
                name: 'Ending Date',
                data: (function (row) {

                    return gridjs.html(`<span">${row.end_date}</span>`);
                    
                })
            },

            {
                name: 'Actions',
                data: (function (row) {

                    return gridjs.html(`

                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Select</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="${row.edit_link}">Edit</a></li>
                            <li><a class="dropdown-item" href="${row.show_teachers_link}">Show Teachers</a></li>
                        </ul>
                    
                    `);
                })
            },
        ],
        pagination: {
            limit: 10
        },
        sort: true,
        search: true,
        data: @json($batches->toArray())
    }).render(document.getElementById("table-gridjs"));

    @if(session('result'))

        var message = @json(session("result"));

        if(message.type == 'error')
    
            Swal.fire({
                html: '<div class="mt-3">' +
                    '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' +
                    '<div class="mt-4 pt-2 fs-15">' +
                    '<h4>Oops...! Something went Wrong !</h4>' +
                    '<p class="text-muted mx-4 mb-0">' + message.message + '</p>' +
                    '</div>' +
                    '</div>',
                showConfirmButton: false,
                buttonsStyling: false,
                showCloseButton: true,
                timer: 5000,
            })

        if(message.type == 'success')
    
            Swal.fire({
                html: '<div class="mt-3">' +
                    '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
                    '<div class="mt-4 pt-2 fs-15">' +
                    '<h4>Success!</h4>' +
                    '<p class="text-muted mx-4 mb-0">' + message.message + '</p>' +
                    '</div>' +
                    '</div>',
                showConfirmButton: false,
                buttonsStyling: false,
                showCloseButton: true,
                timer: 5000,
            })

    @endif

    @if(session('success'))

        var message = '{{session("success")}}';

        Swal.fire({
            html: '<div class="mt-3">' +
                '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
                '<div class="mt-4 pt-2 fs-15">' +
                '<h4>Success!</h4>' +
                '<p class="text-muted mx-4 mb-0">' + message + '</p>' +
                '</div>' +
                '</div>',
            showConfirmButton: false,
            buttonsStyling: false,
            showCloseButton: true,
            timer: 5000,
        })

    @endif


</script>

@endsection