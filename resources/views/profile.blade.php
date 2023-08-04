<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monitoring - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background:#222831">

    <div class="container">

        <form class="user" action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Outer Row -->
            <div class="row justify-content-center" style="margin-top: 12%;background:#1B2028; border-radius:25px">
                <div class="col-xl-4 col-lg-4">
                    <div class="image-area mt-2 mb-2"><img id="imageResult" height="300" width="300"
                            src="{{ auth()->user()->foto ? asset('storage/' . auth()->user()->foto) : '#' }}"
                            alt="" class="rounded-circle mx-auto d-block p-4">
                    </div>

                    <div class="input-group  d-flex justify-content-center align-items-center">
                        <div class="input-group-append">
                            <label for="upload" class="btn btn-light m-0 rounded py-2 px-4"> <i
                                    class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                    class="text-uppercase font-weight-bold text-muted">Pilih File</small></label>
                        </div>

                    </div>
                    <input id="upload" accept="image/*" type="file" name="foto"
                        onchange="readURL(this, 'uploadLabel','imageResult');" class="form-control border-0 py-2"
                        style="opacity: 0;">
                </div>

                <div class="col-xl-8 col-lg-8 col-md-9">
                    <div class="row justify-content-center">

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-100 mb-3" style="font-weight:800">Edit Profile</h1>
                                </div>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <h6>Error</h6>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                @endif
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" name="name" class="form-control form-control-user"
                                            id="exampleFirstName" placeholder="Name" style="border-radius:2rem"
                                            value="{{ auth()->user()->name }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" name="email" class="form-control form-control-user"
                                            id="exampleFirstName" placeholder="Email" style="border-radius:2rem"
                                            value="{{ auth()->user()->email }}">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-user btn-block" style="background:#FFD369">
                                    <span class="font-weight-bold" style="color:#222831">Save</span>
                                </button>

                                <div class="col-sm-4 mb-1 px-0 mb-sm-0 float-right" style="margin-top:20px">
                                    <a href="{{ route('dashboard') }}" class="btn btn-user btn-block"
                                        style="background:#151A21">
                                        <span class="font-weight-bold" style="color:#FFFFFF">Kembali</span>
                                    </a>
                                </div>
        </form>
        <hr>

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
    <script>
        /*  ==========================================
                                                                                                                                                                                                                                                                                    SHOW UPLOADED IMAGE
                                                                                                                                                                                                                                                                                    * ========================================== */
        function readURL(input, info, result) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $("#" + result)
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);

                var fileName = input.files[0].name;
                $("#" + info).text('Filename: ' + fileName);
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                $(".alert").slideUp(500);
            });
        })
    </script>

</body>

</html>
