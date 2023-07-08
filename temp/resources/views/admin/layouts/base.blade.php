<!DOCTYPE html>

<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alokito Teachers | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset_url('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- toaster -->
    <link rel="stylesheet" href="{{asset_url('plugins/toastr/toastr.min.css')}}">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset_url('dist/css/adminlte.min.css')}}">

    <style>
        .form-control {
            border-radius: 0;
        }

        ul.nav.nav-treeview {
            background-color: #0e3662!important;
        }
    </style>

    @yield('style')

    

    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            @include('admin.layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper pt-5">
                
                <!-- Main content -->
                <div class="content">
                    
                    @yield('content')

                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="{{asset_url('plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset_url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Toastr -->
        <script src="{{asset_url('plugins/toastr/toastr.min.js')}}"></script>

        @yield('script01')

        <!-- AdminLTE App -->
        <script src="{{asset_url('dist/js/adminlte.min.js')}}"></script>

        @yield('script02')

        

    </body>
</html>
