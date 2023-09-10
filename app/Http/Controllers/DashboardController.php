<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $datas = Monitoring::all();

        //Mengambil satu data pada tabel monitoring dengan waktu terkini
        $magnitude = Monitoring::orderBy('created_at', 'desc')->first()->magnitude;
        $frekuensi = Monitoring::orderBy('created_at', 'desc')->first()->frekuensi;

        //Memberikan akses kepada blade untuk menampilkan data informasi
        return view('dashboard', compact('magnitude', 'frekuensi'));
    }
}
