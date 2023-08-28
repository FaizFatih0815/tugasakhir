<?php

namespace App\Exports;

use App\Models\Monitoring;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;


class MagnitudeAverageExport implements FromCollection, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $currentDate = Carbon::today();
        $results = collect();

        for ($hour = 0; $hour < 24; $hour++) {
            $hourCarbon = $currentDate->copy()->setTime($hour, 0, 0);

            $records = Monitoring::whereBetween('created_at', [$hourCarbon, $hourCarbon->copy()->addHour()->subMinute()])
                ->orderBy('created_at', 'desc')
                ->avg('magnitude');

            $results->push([
                'time' => $hourCarbon->format('d F Y H:i'),
                'value' => $records ?? 0,
            ]);
        }

        return $results;
    }

    public function title(): string
    {
        return 'Magnitude Average';
    }
}
