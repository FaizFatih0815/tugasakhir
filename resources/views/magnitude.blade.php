<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monitoring - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset ('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include ('layout.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column bg-gray-900">

        

    <!-- Main Content -->
    <div id="content">
        @include ('layout.topbar')

    <!-- Begin Page Content -->
        <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="font-weight-bold mb-0 text-gray-100">Magnitude</h1>
        </div>

    <!-- Content Column -->
    <div class="row">
    <div class="col-lg-6 mb-4 mt-1 mx-auto">

        <table class="table table-bordered">
        

            <thead>
            <tr>
                <th class="text-gray-100" scope="col">Date/Time</th>
                <th class="text-gray-100" scope="col">Magnitude</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <th class="text-gray-100" scope="row">13.7.2023 09.00</th>
                <td class="text-gray-100">10 V</td>
            </tr>
            <tr>
                <th class="text-gray-100" scope="row">13.7.2023 09.10</th>
                <td class="text-gray-100">10 V</td>
            </tr>

            <tr>
                <th class="text-gray-100" scope="row">13.7.2023 09.20</th>
                <td class="text-gray-100">10 V</td>
            </tr>

            <tr>
                <th class="text-gray-100" scope="row">13.7.2023 09.30</th>
                <td class="text-gray-100">10 V</td>
            </tr>

            <tr>
                <th class="text-gray-100" scope="row">13.7.2023 09.40</th>
                <td class="text-gray-100">10 V</td>
            </tr>

            <tr>
                <th class="text-gray-100" scope="row">13.7.2023 09.50</th>
                <td class="text-gray-100">10 V</td>
            </tr>

            </tbody>
        </table>

        @include ('layout.footer')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('js/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>