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

                <h4 class="mb-sm-0">Course List</h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item active">Course List</li>

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
                name: 'Course Name',
                data: (function (row) {

                    return gridjs.html(row.title);
                })
            },
            {
                name: 'Price',
                data: (function (row) {

                    return gridjs.html(`<span">BDT ${row.price}</span>`);
                    
                })
            },
            {
                name: 'Sale Price',
                data: (function (row) {

                    if(row.sale_price != null)
                        return gridjs.html(`<span">BDT ${row.sale_price}</span>`);
                    
                })
            },
            {
                name: 'Preview Video',
                data: (function (row) {

                    return gridjs.html(`<a href="${row.preview_video}" target="blank" class="btn btn-primary d-grid"> View</span>`);
                    
                })
            },
            {
                name: 'Activation Status',
                data: (function (row) {
                    
                    if(row.status == 'inactive')

                        return gridjs.html(`<span"><i class="bx bx-block fs-20"></i></span>`);

                    if(row.status == 'active')

                        return gridjs.html(`<span"><i class="bx bxs-check-circle fs-20"></i></span>`);
                    
                })
            },
            {
                name: 'Actions',
                data: (function (row) {

                    return gridjs.html(`

                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Select</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="${row.edit_link}">Edit</a></li>
                            <li><a class="dropdown-item" href="${row.activation_link}">Change Status</a></li>
                            <li><a class="dropdown-item" href="${row.sequence_link}">Sequence</a></li>
                            ${row.enroll_teacher_link ? '<li><a class="dropdown-item" href="' + row.enroll_teacher_link + '">Enroll Teacher</a></li>' : ''}
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
        data: @json($courses->toArray())
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