@extends('admin.layouts.parent')

@section('css01')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{asset_url('dashboard/assets/libs/gridjs/theme/mermaid.min.css')}}">

@endsection

@section('content')



    <div class="row">

        <div class="col-12">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                <h4 class="mb-sm-0">List Categories  </h4>

                <div class="page-title-right">

                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item active">List Categories</li>

                    </ol>

                </div>

            </div>
        </div>

    </div>


    <div class="row">
        
        <div class="col-lg-12">

            <div class="card">

            <div class="card ribbon-box border shadow-none mb-lg-0 right">
                <div class="card-body">
                    <div class="ribbon ribbon-info ribbon-shape">Info</div>
                    <h5 class="fs-14 text-start">Important Note</h5>
                    <div class="ribbon-content text-muted mt-4">
                        <p class="mb-0">
                            There are 7 types of categories: <strong>Subject, Book, Grade, Tag, Medium, Year, Other</strong>.
                            If you want to find categories of a particular type. Please seacrh with the ebove keywords in the search field.
                        </p>
                    </div>
                </div>
            </div>

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
                width: '80px',
                formatter: (function (cell) {
                    return gridjs.html('<span class="fw-semibold">' + cell + '</span>');
                })
            },
            {
                name: 'Category Name',
                width: '150px',
                data: (function (row) {

                    return gridjs.html(row.name);
                })
            },
            {
                name: 'Category Type',
                width: '250px',
                data: (function (row) {

                    return gridjs.html(`<span class="badge badge-gradient-dark">${row.type}</span>`);
                    
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
            limit: 10
        },
        sort: true,
        search: true,
        data: @json($categories->toArray())
    }).render(document.getElementById("table-gridjs"));


</script>

@endsection