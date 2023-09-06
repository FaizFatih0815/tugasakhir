<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MagnitudeExport;

class MagnitudeController extends Controller
{
    public function pagination($results, $page, $perPage)
    {
        $paginatedResults = new \Illuminate\Pagination\LengthAwarePaginator(
            $results->forPage($page, $perPage),
            $results->count(),
            $perPage,
            $page,
            ['path' => request()->url()] // The URL for the pagination links
        );

        return $paginatedResults;
    }

    public function magnitude()
    {
        $currentDate = Carbon::today();
        $results = collect();

        // Loop through each hour from 00:00 to 23:00
        for ($hour = 0; $hour < 24; $hour++) {
            // Set the specific hour and minute for the current iteration
            $hourCarbon = $currentDate->copy()->setTime($hour, 0, 0);

            // Get the records for the current hour
            $records = Monitoring::whereBetween('created_at', [$hourCarbon, $hourCarbon->copy()->addHour()->subMinute()])
                ->orderBy('created_at', 'desc')
                ->avg('magnitude');

            // If there are records for the current hour, add them to the results array
            $results->push([
                'time' => $hourCarbon->format('d F Y H:i'),
                'value' => round($records, 1, PHP_ROUND_HALF_DOWN) ?? 0,
            ]);
        }


        $perPage = 6; // Number of items per page
        $page = request()->get('page', 1); // Get the current page from the query string
        $paginatedResults = $this->pagination(
            $results,
            $page,
            $perPage,
        );

        $paginatedResults->withQueryString()->setPageName('page'); // Change 'page' to 'switch_page'

        // Fetch records from the Monitoring model
        $records = Monitoring::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->get(); // You need to fetch data from your database

        // Initialize an array to store the filtered results
        $filteredResults = [];

        foreach ($records as $record) {
            // Check if the magnitude value is below 20
            if ($record->magnitude < 20) {
                // Add the record to the filtered results array
                $filteredResults[] = [
                    'time_switch' => $record->created_at,
                    'value_switch' => $record->magnitude,
                ];
            }
        }

        $perPageSwitch = 5; // Number of items per page
        $pageSwitch = request()->get('page-switch', 1); // Get the current page from the query string
        $filteredResults = collect($filteredResults);

        $paginatedResults_Switch = $this->pagination(
            $filteredResults,
            $pageSwitch,
            $perPageSwitch,
        );

        $paginatedResults_Switch->withQueryString()->setPageName('page-switch');

        return view(
            'magnitude',
            compact(
                'paginatedResults',
                'paginatedResults_Switch'
            )
        );
    }

    public function export()
    {
        return Excel::download(new MagnitudeExport(2018), 'Magnitude.xlsx');
    }
}
