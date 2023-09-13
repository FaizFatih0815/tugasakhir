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

    <title>Monitoring - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body style="background:#222831">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center" style="margin-top: 12%">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="row justify-content-center">

                    <div class="col-lg-6">
                        <div class="p-5" style="background:#1B2028; border-radius:25px">
                            <div class="text-center">
                                <h1 class="h4 text-gray-100 mb-2">Forgot Your Password?</h1>
                                <p class="mb-3">Masukkan email anda dibawah, kemudian kami akan mengirim kamu link
                                    untuk mereset password anda!
                                </p>
                            </div>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <input type="email" name="email" style="border-radius:25px"
                                        class="form-control form-control-user" id="exampleInputEmail"
                                        aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                </div>
                                <button type="submit" class="btn btn-user btn-block"
                                    style="background:#FFD369; border-radius:25px">
                                    <span class="font-weight-bold" style="color:#222831">Reset Password</span>
                                </button>
                            </form>
                            <hr>

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
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
