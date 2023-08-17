<?php

namespace App\Http\Controllers;

use App\Exports\MagnitudeExport;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class MagnitudeController extends Controller
{
    public function magnitude()
    {
        $currentDate = Carbon::today();

        // Initialize an array to store the results
        $results = collect();

        // Loop through each hour from 00:00 to 23:00
        // for ($hour = 0; $hour < 24; $hour++) {
        //     // Set the specific hour and minute for the current iteration
        //     $hourCarbon = $currentDate->copy()->setTime($hour, 0, 0);

        //     // Get the records for the current hour
        //     $records = Monitoring::whereBetween('created_at', [$hourCarbon, $hourCarbon->copy()->addHour()->subMinute()])
        //         ->orderBy('created_at', 'desc')
        //         ->first();

        //     // If there are records for the current hour, add them to the results array
        //     $results->push([
        //         'time' => $hourCarbon->format('d F Y H:i'),
        //         'value' => $records->magnitude ?? 0,
        //     ]);
        foreach ($results as $record) {
            // Check if the frequency is below 20
            if ($record['value'] < 20) {
                // Add the record to the filtered results array
                $filteredResults[] = [
                    'time' => $record['time'],
                    'value' => $record['value'],
                ];
            }
        }

        // for ($hour = 0; $hour < 24; $hour++) {
        //     for ($minute = 0; $minute < 60; $minute += 30) {
        //         // Set the specific hour and minute for the current iteration
        //         $hourCarbon = $currentDate->copy()->setTime($hour, $minute, 0);

        //         // Get the records for the current half hour
        //         $records = Monitoring::whereBetween('created_at', [$hourCarbon, $hourCarbon->copy()->addMinutes(30)->subSecond()])
        //             ->orderBy('created_at', 'desc')
        //             ->first();

        //         // If there are records for the current half hour and frequency is below 20, add them to the results array
        //         if ($records && $records->frekuensi < 20) {
        //             $results->push([
        //                 'time' => $hourCarbon->format('d F Y H:i'),
        //                 'value' => $records->frekuensi,
        //             ]);
        //         }
        //     }
        // }


        // $results[$hour]['time'] = $hourCarbon->format('d F Y H:i');
        // $results[$hour]['value'] = $records->magnitude;


        // $results = collect($results);
        // Perform simple pagination on the $results collection
        $perPage = 6; // Number of items per page
        $page = request()->get('page', 1); // Get the current page from the query string
        $paginatedResults = new \Illuminate\Pagination\LengthAwarePaginator(
            $results->forPage($page, $perPage),
            $results->count(),
            $perPage,
            $page,
            ['path' => request()->url()] // The URL for the pagination links
        );

        // dd($paginatedResults);

        $maximum = Monitoring::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->max('magnitude');
        $minimum = Monitoring::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->min('magnitude');

        return view('magnitude', compact('paginatedResults', 'maximum', 'minimum'));
    }

    public function export()
    {
        return Excel::download(new MagnitudeExport, 'Magnitude.xlsx');
    }
}
