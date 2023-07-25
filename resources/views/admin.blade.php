@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <div style="margin-bottom:20px">
                    <h1 class="font-weight-bold mb-0 text-gray-100">Admin</h1>
                </div>
            </div>

            <div class="table-responsive card mb-3" style="background: #222831">
                <table class="table table-bordered mb-0">

                    <thead>
                        <tr>
                            <th class="text-gray-100" scope="col">Nama</th>
                            <th class="text-gray-100" scope="col">Email</th>
                            <th class="text-gray-100 w-25" style="text-align:center" scope="col">Customize</th>

                        </tr>
                    </thead>

                    <tbody>
                        {{-- @foreach ($paginatedResults as $res)
                            <tr>
                                <th class="text-gray-100" scope="row">{{ $res['time'] }}</th>
                                <td class="text-gray-100">{{ $res['value'] }} V</td>
                            </tr>
                        @endforeach --}}

                        <tr>
                            <td style="color:#FFFFFF">Admin</td>
                            <td style="color:#FFFFFF">Admin@gmail.com</td>
                            <td>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 2%">
                                        <i class="fas fa-solid fa-bolt mr-2"></i>
                                        <span class="font-weight-bold" style="color:#FFFFFF">Edit</span>
                                    </button>

                                    <button type="submit" class="btn btn-danger ">
                                        <i class="fas fa-solid fa-bolt pr-2"></i>
                                        <span class="font-weight-bold" style="color:#FFFFFF">Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="color:#FFFFFF">Admin 1</td>
                            <td style="color:#FFFFFF">Admin1@gmail.com</td>
                            <td>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 2%">
                                        <i class="fas fa-solid fa-bolt mr-2"></i>
                                        <span class="font-weight-bold" style="color:#FFFFFF">Edit</span>
                                    </button>

                                    <button type="submit" class="btn btn-danger ">
                                        <i class="fas fa-solid fa-bolt pr-2"></i>
                                        <span class="font-weight-bold" style="color:#FFFFFF">Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="color:#FFFFFF">Admin</td>
                            <td style="color:#FFFFFF">Admin@gmail.com</td>
                            <td>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 2%">
                                        <i class="fas fa-solid fa-bolt mr-2"></i>
                                        <span class="font-weight-bold" style="color:#FFFFFF">Edit</span>
                                    </button>

                                    <button type="submit" class="btn btn-danger ">
                                        <i class="fas fa-solid fa-bolt pr-2"></i>
                                        <span class="font-weight-bold" style="color:#FFFFFF">Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@stop
