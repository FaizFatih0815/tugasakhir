<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnalyticController extends Controller
{
    public function analytic()
    {
        $currentDate = Carbon::today();

        $dates = [];
        for ($i = 0; $i < 7; $i++) {
            $dates[] = Carbon::now()->subDays($i)->format('d/m/Y');
        }

        $labels = [];
        for ($i = 0; $i < 7; $i++) {
            $labels[] = Carbon::now()->subDays($i)->format('d M');
        }
        $max_magnitude = [];
        $min_magnitude = [];
        $max_frequency = [];
        $min_frequency = [];

        foreach ($dates as $date) {
            $startDate = Carbon::createFromFormat('d/m/Y', $date)->startOfDay();
            $endDate = Carbon::createFromFormat('d/m/Y', $date)->endOfDay();

            $max_magnitude[] = Monitoring::whereBetween('created_at', [$startDate, $endDate])->max('magnitude');
            $min_magnitude[] = Monitoring::whereBetween('created_at', [$startDate, $endDate])->min('magnitude');
            $max_frequency[] = Monitoring::whereBetween('created_at', [$startDate, $endDate])->max('frequency');
            $min_frequency[] = Monitoring::whereBetween('created_at', [$startDate, $endDate])->min('frequency');
        }
        // dd($dates);

        $dates = array_reverse($dates);
        $labels = array_reverse($labels);
        $max_magnitude = array_reverse($max_magnitude);
        $min_magnitude = array_reverse($min_magnitude);
        $max_frequency = array_reverse($max_frequency);
        $min_frequency = array_reverse($min_frequency);


        return view('analytic', compact('labels', 'dates', 'max_magnitude', 'min_magnitude', 'max_frequency', 'min_frequency'));
    }
}
