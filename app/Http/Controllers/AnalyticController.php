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
        $max_frekuensi = [];
        $min_frekuensi = [];

        foreach ($dates as $date) {
            $startDate = Carbon::createFromFormat('d/m/Y', $date)->startOfDay();
            $endDate = Carbon::createFromFormat('d/m/Y', $date)->endOfDay();

            $max_magnitude[] = Monitoring::whereBetween('created_at', [$startDate, $endDate])->max('magnitude');
            $min_magnitude[] = Monitoring::whereBetween('created_at', [$startDate, $endDate])->min('magnitude');
            $max_frekuensi[] = Monitoring::whereBetween('created_at', [$startDate, $endDate])->max('frekuensi');
            $min_frekuensi[] = Monitoring::whereBetween('created_at', [$startDate, $endDate])->min('frekuensi');
        }
        // dd($dates);

        $dates = array_reverse($dates);
        $labels = array_reverse($labels);
        $max_magnitude = array_reverse($max_magnitude);
        $min_magnitude = array_reverse($min_magnitude);
        $max_frekuensi = array_reverse($max_frekuensi);
        $min_frekuensi = array_reverse($min_frekuensi);


        return view('analytic', compact('labels', 'dates', 'max_magnitude', 'min_magnitude', 'max_frekuensi', 'min_frekuensi'));
    }
    public function analytic1()
    {
        $currentDate = Carbon::today();

        $timestamps = [];
        $labels = [];

        // Calculate timestamps and labels for the past 7 days
        for ($i = 0; $i < 7; $i++) {
            $timestamp = Carbon::now()->subDays($i)->startOfDay();
            $timestamps[] = $timestamp;
            $labels[] = $timestamp->format('d M');
        }

        $max_magnitude = [];
        $max_frekuensi = [];

        foreach ($timestamps as $timestamp) {
            $startTimestamp = $timestamp;
            $endTimestamp = $timestamp->copy()->addMinutes(30);

            $max_magnitude[] = Monitoring::whereBetween('created_at', [$startTimestamp, $endTimestamp])->max('magnitude');
            $max_frekuensi[] = Monitoring::whereBetween('created_at', [$startTimestamp, $endTimestamp])->max('frekuensi');
        }

        // Reversing the arrays to match the order
        $timestamps = array_reverse($timestamps);
        $labels = array_reverse($labels);
        $max_magnitude = array_reverse($max_magnitude);
        $max_frekuensi = array_reverse($max_frekuensi);

        return view('analytic', compact('labels', 'timestamps', 'max_magnitude', 'max_frekuensi'));
    }
}
