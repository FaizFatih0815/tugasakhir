@extends('layout.layout')

@section('content')
    <div class="container-fluid">

        <div class="row">

            <!-- Page Heading -->
            <div class="col-6 text-center">
                <div style="margin-bottom:20px">
                    <h1 class="font-weight-bold mb-0 text-gray-100">Magnitude</h1>
                </div>

                <!-- Content Column -->
                <div class="row" style="margin-left:0%">

                    <div class="col-lg-12 mb-4 mt-1">

                        <div class="table-responsive card mb-3" style="background: #222831">
                            <table class="table table-bordered mb-0">

                                <thead>
                                    <tr>
                                        <th class="text-gray-100" scope="col">Date/Time</th>
                                        <th class="text-gray-100" scope="col">Magnitude</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($paginatedResults as $res)
                                        <tr>
                                            <th class="text-gray-100" scope="row">{{ $res['time'] }}</th>
                                            <td class="text-gray-100">{{ $res['value'] }} V</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{ $paginatedResults->links('pagination::custom') }}
                    </div>
                </div>
            </div>

            <div class="col-6 px-4" style="margin-top: 65px; color:#EEEEEE; text-align:justify">
                <p style="font-size:24px"> Data tersebut adalah data dari <b style="color:#FFD369">Nilai Magnitude</b> yang
                    masuk kedalam sistem tiap jam selama satu hari.
                    Untuk nilai magnitude tertinggi yang masuk hingga saat ini senilai <b
                        style="color:#FFD369">{{ $maximum }} V</b>, dan nilai magnitude terendahnya senilai <b
                        style="color:#FFD369">{{ $minimum }} V</b>.
                </p>

                <p style="font-size:24px">Silahkan klik button di bawah untuk mendownload data pada tabel di samping.
                </p>

                <div class="col-sm-4 mb-1 px-0 mb-sm-0" style="margin-top:0px">
                    <a href="{{ route('magnitude.export') }}" class="btn btn-user btn-block" style="background:#151A21">
                        <span class="font-weight-bold" style="color:#FFFFFF">Download</span>
                    </a>
                </div>

            </div>

        </div>
    </div>
@stop
