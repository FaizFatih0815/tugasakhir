@extends('layout.layout')

@section('content')
    <div class="container-fluid;">

        {{-- <img class="{{ route('DashboardPhoto.png') }}"> --}}
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center mb-4" style="margin-left:24%; margin-top: 2%">
            <h1 class="font-weight-bold mb-0" style="color:#EEEEEE">Dashboard</h1>
        </div>

        <div class="row">

            <img src="{{ asset('img/DashboardPhoto.png') }}" width="300" height="400"
                style="margin-left:15%; margin-top:0%">

            <div style="margin-left:3%">
                <!-- Content Row -->

                <div class="col-xl-4 col-md-6 col-sm-12 mb-4" style="margin-left:auto; margin-right:3%">
                    <div class="card shadow h-100 py-4" style="border-left:11px solid #FFD369">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-S font-weight-bold text-gray-800 text-uppercase mb-1">
                                        Magnitude</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">10 V</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-bolt fa-2x text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 col-sm-12 mb-4" style="margin-left:auto; margin-right:3%">
                    <div class="card shadow h-100 py-4" style="border-left:11px solid #FFD369">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-s font-weight-bold text-gray-800 text-uppercase mb-1">
                                        Frequency</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">30 Hz</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-wave-square fa-2x text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 col-sm-12 mb-4" style="margin-left:auto; margin-right:3%">
                    <div class="card shadow h-100 py-4" style="border-left:11px solid #FCC23F; background-color:#FFD369">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-s font-weight-bold text-gray-800 text-uppercase mb-1">
                                        STATUS</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Aman</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-check fa-2x" style="color:#fdbf2e"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                {{-- <div style="margin-left:0%">
                        <div class="col-xl-4 col-md-6 col-sm-12 mb-4" style="margin-left:auto; margin-right:3%">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <img src="{{ asset('img/DashboardPhoto.png') }}" width="300" height="400">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div> --}}

                <!-- End of Content Wrapper -->
            </div>


        </div>

    </div>
@stop

@section('customscript')
    <script></script>
@stop
