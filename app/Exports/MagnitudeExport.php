<?php

namespace App\Exports;

use App\Models\Monitoring;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class MagnitudeExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
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
                'value' => $records->magnitude ?? 0,
            ]);

            // $results[$hour]['time'] = $hourCarbon->format('d F Y H:i');
            // $results[$hour]['value'] = $records->magnitude;
        }

        return $results;
    }
}
