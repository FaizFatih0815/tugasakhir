<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monitoring - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gray-900">
    
    <div class="container">
        <div class="text-center mb-3" style="margin-top: 18%">
            <h1 class="font-weight-bold mb-0 text-gray-100">WEBSITE MONITORING</h1>
            <h1 class="font-weight-bold mb-0 text-gray-100">TUGAS AKHIR</h1>

            <div class="form-group" style="max-width: 100 px;">
                <input type="email" class="form-control form-control-user" style="margin-top: 2%"
                    id="exampleInputEmail" aria-describedby="emailHelp"
                    placeholder="Enter Email Address...">
            </div>

            <div class="form-group" style="max-width: 100 px;">
                <input type="password" class="form-control form-control-user"
                    id="exampleInputPassword" placeholder="Password">
            </div>

        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-warning btn-user btn-block">
            <span class="font-weight-bold text-gray-900">Login</span>
        </a>

            <hr>
                <div class="text-center">
                <a class="text-gray-100 small" href="{{  route('forgotpassword') }}">Forgot Password?</a>
                </div>
                <div class="text-center">
                <a class="text-gray-100 small" href="{{ route('register') }}">Create an Account!</a>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>