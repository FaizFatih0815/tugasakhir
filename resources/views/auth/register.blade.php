<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

    <title>Monitoring - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body style="background:#222831">

    <div class="container">


        <div class="row text-center mb-0 justify-content-center" style="margin-top:0%">

            <div class="col-lg-8">
                <div class="px-4 py-4" style="background:#1B2028; margin-top:25%; border-radius:25px">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="text-center p-0">
                            <div class="text-center">
                                <h1 class="h4 text-gray-100 mb-4">Create an Account!</h1>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }} </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" name="name" class="form-control form-control-user"
                                        id="exampleFirstName" placeholder="Input Name" style="border-radius:2rem">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user"
                                    id="exampleInputEmail" placeholder="Email Address" style="border-radius:2rem">
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0 pr-0">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password" style="border-radius:2rem">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="password_confirmation"
                                        class="form-control form-control-user" id="exampleRepeatPassword"
                                        placeholder="Repeat Password" style="border-radius:2rem">
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-user btn-block"
                            style="background:#FFD369; border-radius:2rem">
                            <span class="font-weight-bold" style="color:#222831">Register Account</span>
                        </button>
                        <hr>
                    </form>

                    <div class="text-center">
                        <a class="text-gray-100 small" href="{{ route('forgotpassword') }}">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="text-gray-100 small" href="{{ route('login') }}">Already have an account?
                            Login!</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
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
