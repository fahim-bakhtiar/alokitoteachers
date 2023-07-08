<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Alokito Teachers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Tech hub for teachers in Bangladesh" name="description" />
    <meta content="Alokito Teachers" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset_url('dashboard/assets/images/favicon.ico')}}">

    <!-- Layout config Js -->
    <script src="{{asset_url('dashboard/assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset_url('dashboard/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset_url('dashboard/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    @yield('css01')

    <!-- App Css-->
    <link href="{{asset_url('dashboard/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset_url('dashboard/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

    @yield('css02')

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== App Header ========== -->
        @include('admin.layouts.partials.header')

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        <!-- ========== App Menu ========== -->
        
        @include('admin.layouts.partials.menu')

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page content -->

                    @yield('content')
                    
                    <!-- end page content -->

                    

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- Footer -->
            @include('admin.layouts.partials.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    

    <!-- Customizer -->
    @include('admin.layouts.partials.customizer')


    <!-- JAVASCRIPT -->
    <script src="{{asset_url('dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset_url('dashboard/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset_url('dashboard/assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset_url('dashboard/assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset_url('dashboard/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{asset_url('dashboard/assets/js/plugins.js')}}"></script>

    <!-- these two need to be here available to all pages becuase the plugins.js file can't load them properly -->
    <script type='text/javascript' src="{{asset_url('dashboard/assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>
    <script type='text/javascript' src="{{asset_url('dashboard/assets/libs/flatpickr/flatpickr.min.js')}}"></script>

    @yield('js01')

    <!-- App js -->
    <script src="{{asset_url('dashboard/assets/js/app.js')}}"></script>

    @yield('js02')
</body>

</html>