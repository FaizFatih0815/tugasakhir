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
    @yield('customcss')
</head>

<body style="background:#222831">

    <div class="container">
        <div class="row justify-content-center align-items-center" style="margin-top: 14%">
            <div class="col-md-8">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <div class="card" style="background:#1B2028; border:0; border-radius:25px">

                        <div class="card-body px-5 py-5">
                            <div class="text-center" style="margin-bottom: 1%">
                                <h1 class="h4 text-gray-100 mb-2"
                                    style="color: #FFFFFF; font-weight:600; font-size:30px">
                                    Reset Your
                                    Password?</h1>
                            </div>


                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3">
                                <label for="email" class="col-form-label text-md-end"
                                    style="color: #FFFFFF">{{ __('Email Address') }}</label>

                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="password" class=" col-form-label text-md-end"
                                    style="color: #FFFFFF">{{ __('Password') }}</label>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="row mb-4">
                                <label for="password-confirm" class=" col-form-label text-md-end"
                                    style="color: #FFFFFF">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn"
                                        style="background:#FFD369; color:#1B2028; font-weight:600">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                </form>
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
