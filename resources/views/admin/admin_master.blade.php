<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('admin-tmp/images/favicon.ico') }}">

    <title>Unipuras Admin - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('admin-tmp/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('admin-tmp/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-tmp/css/skin_color.css') }}">
    <!-- Toster -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">
        <!-- Main-Header -->
        @include('admin.admin-body.header')
        <!-- Main-Header -->
        
        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.admin-body.sidebar')
        <!-- Content Wrapper. Contains page content -->
        
        <div class="content-wrapper">
            @yield('admin')
        </div>
        <!-- /.content-wrapper -->

        <!-- Main-footer -->
        @include('admin.admin-body.footer')
        <!-- Main-footer -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->


    <!-- Vendor JS -->
    <script src="{{asset('admin-tmp/js/vendors.min.js')}}"></script>
    <script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
    <script src="{{asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
    <script src="{{asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

    <!-- Sunny Admin App -->
    <script src="{{asset('admin-tmp/js/template.js')}}"></script>
    <script src="{{asset('admin-tmp/js/pages/dashboard.js')}}"></script>
    <!-- Toster -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if(Session::has('message'))
    <script>
        var type ="{{ Session::get('alert-type','info') }}" 
        switch(type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
            break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
            break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
            break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
            break;
        }
    </script>
    @endif
</body>
</html>