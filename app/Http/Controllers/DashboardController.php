<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $datas = Monitoring::all();
        $magnitude = Monitoring::orderBy('created_at', 'desc')->first()->magnitude;
        $frekuensi = Monitoring::orderBy('created_at', 'desc')->first()->frekuensi;
        // dd($frequency);
        return view('dashboard', compact('magnitude', 'frekuensi'));
    }
}
