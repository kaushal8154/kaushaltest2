<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> {{ env('APP_NAME') }} - Admin </title>

        <!-- Common CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
        <link rel="stylesheet" href="{{ url('assets/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}" />
        <!-- ************** -->

        <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">        

    </head>
    
    <body class="sidebar-mini layout-fixed" style="height: auto;">

        <div class="wrapper" >

            <!-- Navbar -->
            @include('admin.layouts.header')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('admin.layouts.sidebar')
            <!-- *** -->

            @yield('pagecontent')

            <!-- Footer -->
            @include('admin.layouts.footer')
            <!-- /.footer -->

        </div>

        <!-- Common js -->

        <script src="{{ asset('js/jquery.js') }}"></script>   
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>	
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <!-- ******************* -->

        <script>
            var site_url = '{{ config("app.url") }}';                        
            var admin_url = '{{ config("app.url") }}'+'/admin';                       
            
        </script>

        @yield('pagescript')


        @yield('pagecss')

    </body>
</html>    