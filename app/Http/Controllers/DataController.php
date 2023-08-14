<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function insertData(Request $request)
    {
        $frequency = $request->input('frequency');
        $magnitude = $request->input('magnitude');

        DB::table('monitorings')->insert([
            'frequency' => $frequency,
            'magnitude' => $magnitude,
        ]);

        return response()->json(['message' => 'Data inserted successfully']);
    }
}
