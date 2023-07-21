@extends('layout.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center mb-4" style="margin-left:17%; margin-top:2%">
            <h1 class="font-weight-bold mb-0 text-gray-100">Magnitude</h1>
        </div>

        <!-- Content Column -->
        <div class="row" style="margin-left:0%">
            <div class="col-lg-6 mb-4 mt-1">

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
            </div>
        </div>
    </div>
@stop
