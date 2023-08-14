<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function insertData(Request $request)
    {
        // Retrieve input data
        $frequency = $request->input('frequency');
        $magnitude = $request->input('magnitude');

        try {
            // Insert data into the 'monitorings' table
            DB::table('monitorings')->insert([
                'frequency' => $frequency,
                'magnitude' => $magnitude,
            ]);

            // Return a success response
            return response()->json(['message' => 'Data inserted successfully']);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
