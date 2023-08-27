<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
{
    public function index()
    {
        $mhs = [
            [
                'name' => 'Faiz Al-Fatih',
                'angkatan' => '2019',
                'mata_kuliah' => [
                    [
                        'kode_mk' => 'PTEL219',
                        'mata_kuliah' => 'Mikroprosessor',
                        'pengampu' => [
                            [
                                'nip' => '21120120-21',
                                'nama' => 'Dr. Wahyudi',
                            ],
                            [
                                'nip' => '21120122121',
                                'nama' => 'Dr. Iwan',
                            ]
                        ],
                    ],
                    [
                        'kode_mk' => 'PTEL0120',
                        'mata_kuliah' => 'Sistem Informasi',
                    ],
                ]
            ],
            [
                'name' => 'Naufal Asyraf',
                'angkatan' => '2020',
            ],
            [
                'name' => 'Nasywa Wahyu',
                'angkatan' => '2021',
            ]
        ];

        return response()->json($mhs, 200)->header('Content-Type', 'application/json');;
    }
}
