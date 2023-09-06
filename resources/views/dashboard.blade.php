@extends('layout.layout')

@section('content')
    <div class="container-fluid;">

        <div class="row">

            <div class="col-6 text-center">
                <h1 class="mb-0" style="color:#EEEEEE; font-weight:800 !important">DASHBOARD</h1>
                <div style="margin-left:10%; margin-right:10%; border-radius:10%; margin-top:15px; background:#1B2028">
                    <img src="{{ asset('img/DashboardPhoto.png') }}" width="330" height="470">
                </div>
            </div>

            <div class="col-6">
                <div class="px-4" style="margin-left:1%; margin-right:5%">
                    <!-- Content Row -->
                    <div class="card shadow h-100 py-4 mb-4" style="margin-top:30px; border-left:11px solid #FFD369">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-S text-gray-900 text-uppercase mb-1"
                                        style="font-weight:800 !important">
                                        Magnitude</div>
                                    <div class="h5 mb-0 text-gray-900" style="font-weight:600 !important">
                                        {{ $magnitude }} V</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-bolt fa-2x text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow h-100 py-4 mb-4" style="border-left:11px solid #FFD369">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-s text-gray-900 text-uppercase mb-1"
                                        style="font-weight:800 !important">
                                        Frequency</div>
                                    <div class="h5 mb-0 text-gray-900" style="font-weight:600 !important">
                                        {{ $frekuensi }} Hz</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-wave-square fa-2x text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow h-100 py-4"
                        style="border-left:11px solid @if ($magnitude >= 220) #455847 @else #ae0000 @endif; background-color:@if ($magnitude >= 220) #AACB73  @else #D71313 @endif">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-s text-uppercase mb-1"
                                        style="font-weight:800 !important; color: @if ($magnitude >= 220) #455847 @else #ffffff @endif">
                                        STATUS</div>
                                    <div class="h5 mb-0"
                                        style="font-weight:600 !important; color: @if ($magnitude >= 220) #455847 @else #ffffff @endif">
                                        @if ($magnitude >= 220)
                                            Aman
                                        @else
                                            Tidak Aman
                                        @endif
                                    </div>

                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-solid fa-check fa-2x"
                                        style="color:@if ($magnitude >= 220) #9EBC64  @else #ae0000 @endif"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Content Wrapper -->

                </div>
            </div>

        </div>

    </div>
@stop

@section('customscript')
    <script>
        setTimeout(function() {
            location.reload();
        }, 5000);
    </script>
@stop
