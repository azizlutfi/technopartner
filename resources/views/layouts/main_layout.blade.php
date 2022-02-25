<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Technopartner') }}</title>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/user/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/user/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @yield('sidebar')

        @yield('content')

    </div>
    <!-- End of Page Wrapper -->
    <script>
        $('.datetimepicker').datetimepicker({
            mask:true,
            format:'d-m-Y',
            timepicker:false
        });
    </script>
    <script type="text/javascript">
          var APP_URL = {!! json_encode(url('/')) !!}
    </script>
</body>

</html>