<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/frontend/img/favicon.png') }}">
    <title>NapZone | Play Exclusive Games</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/assets/backend/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Toaster -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- morris CSS -->
    <link href="{{ asset('/assets/backend/plugins/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('/assets/backend/css/style.css') }}" rel="stylesheet">
    <!-- colors from-->
    <link href="{{ asset('/assets/backend/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <!---new add ---->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    @yield('styles')
    @livewireStyles
</head>

<body class="fix-header fix-sidebar card-no-border">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        @include('backend.layouts.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        @include('backend.layouts.sidebar')
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">@yield('pageName')</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">@yield('pageName')</li>
                    </ol>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                @yield('content')
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('backend.layouts.footer')
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('/assets/backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('/assets/backend/plugins/popper/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('/assets/backend/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('/assets/backend/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('/assets/backend/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('/assets/backend/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('/assets/backend/js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="{{ asset('/assets/backend/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--morris JavaScript -->
    <script src="{{ asset('/assets/backend/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('/assets/backend/plugins/morrisjs/morris.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('/assets/backend/js/dashboard1.js') }}"></script>
    <!-- Toaster JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('/assets/backend/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
    @if (@session('success'))
        <script>
            toastr.success("{!! @session('success') !!}");
        </script>
    @endif
    @if (@session('error'))
        <script>
            toastr.error("{!! @session('error') !!}");
        </script>
    @endif

    @yield('scripts')
    @livewireScripts
</body>

</html>
