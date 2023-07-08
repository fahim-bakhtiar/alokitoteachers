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

                <h4 class="mb-sm-0">List Admin Users  </h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item active">List Admin</li>

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
                width: '80px',
                formatter: (function (cell) {
                    return gridjs.html('<span class="fw-semibold">' + cell + '</span>');
                })
            },
            {
                name: 'Name',
                width: '150px',
            },
            {
                name: 'Email',
                width: '220px',
                formatter: (function (cell) {
                    return gridjs.html('<a href="">' + cell + '</a>');
                })
            },
            {
                name: 'Level',
                width: '250px',
                data: (function (row) {

                    if(row.admin_level == 1)

                        return gridjs.html('<span class="fw-semibold">' + '<span class="badge badge-gradient-dark">Admin</span>' + '</span>');

                })
            },
            {
                name: 'Account Status',
                width: '250px',
                data: (function (row) {

                    if(row.active == 1)

                        return gridjs.html('<span class="fw-semibold">' + '<i class="bx bx-user-check fs-20"></i>' + '</span>');

                    if(row.active == 0)

                        return gridjs.html('<span class="fw-semibold">' + '<i class="bx bx-user-x fs-20"></i>' + '</span>');

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
                            <li><a class="dropdown-item" href="${row.status_change_link}">Change Status</a></li>
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
        data: @json($admins->toArray())
    }).render(document.getElementById("table-gridjs"));


    @if(session('success'))

        Swal.fire({
            html: '<div class="mt-3">' +
                '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>' +
                '<div class="mt-4 pt-2 fs-15">' +
                '<h4>Success</h4>' +
                '<p class="text-muted mx-4 mb-0">Admin status has been changed successfully!</p>' +
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
