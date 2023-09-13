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

    <link
        href='https://fonts.googleapis.com/css?family=Montserrat:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i'
        rel='stylesheet'>

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat' !important;
        }
    </style>
</head>

<body style="background:#222831">

    <div class="container">


        <div class="row justify-content-center align-items-center">

            <div class="col-8">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div
                        style="margin-left:10%; margin-right:10%; border-radius:10%; margin-top:15px; background:#FFD369">
                        <div class="text-center mb-3" style="margin-top: 12%">
                            <img src="{{ asset('img/LogoUndip.png') }}" width="200" height="200">
                            <h1 class="font-weight-bold mb-0 text-gray-100">WEBSITE MONITORING</h1>
                            <h1 class="font-weight-bold mb-0 text-gray-100">SISTEM ATS</h1>


                            <div class="form-group" style="max-width: 100 px;">
                                <input type="email" class="form-control form-control-user pl-3"
                                    style="margin-top: 3%; border-radius:2rem" id="exampleInputEmail"
                                    aria-describedby="emailHelp" placeholder="Enter Email Address...">
                            </div>

                            <div class="form-group" style="max-width: 100 px;">
                                <input type="password" class="form-control form-control-user pl-3"
                                    style="border-radius:2rem" id="exampleInputPassword" placeholder="Password">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-user btn-block" style="border-radius:2rem; background:#FFD369">
                        <span class="font-weight-bold" style="color:#222831">Login</span>
                    </button>
                </form>

                <hr>

                <div class="text-center">
                    <a class="text-gray-100 small" href="{{ route('forgotpassword') }}">Forgot Password?</a>
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
