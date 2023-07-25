<?php

namespace App\Http\Controllers;

use App\Exports\FrequencyExport;
use App\Models\Monitoring;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FrequencyController extends Controller
{
    public function frequency()
    {
        $currentDate = Carbon::today();

        // Initialize an array to store the results
        $results = collect();

        // Loop through each hour from 00:00 to 23:00
        for ($hour = 0; $hour < 24; $hour++) {
            // Set the specific hour and minute for the current iteration
            $hourCarbon = $currentDate->copy()->setTime($hour, 0, 0);

            // Get the records for the current hour
            $records = Monitoring::whereBetween('created_at', [$hourCarbon, $hourCarbon->copy()->addHour()->subMinute()])
                ->orderBy('created_at', 'desc')
                ->first();

            // If there are records for the current hour, add them to the results array
            $results->push([
                'time' => $hourCarbon->format('d F Y H:i'),
                'value' => $records->frequency ?? 0,
            ]);

            // $results[$hour]['time'] = $hourCarbon->format('d F Y H:i');
            // $results[$hour]['value'] = $records->magnitude;
        }

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

        return view('frequency', compact('paginatedResults'));
    }

    public function export()
    {
        return Excel::download(new FrequencyExport, 'Frequency.xlsx');
    }
}
