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
        $frequency = Monitoring::orderBy('created_at', 'desc')->first()->frequency;
        // dd($frequency);
        return view('dashboard', compact('magnitude', 'frequency'));
    }
}
