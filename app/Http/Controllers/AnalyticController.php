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
        // $min_magnitude = [];
        $max_frekuensi = [];
        // $min_frekuensi = [];

        foreach ($dates as $date) {
            $startDate = Carbon::createFromFormat('d/m/Y', $date)->startOfDay();
            $endDate = Carbon::createFromFormat('d/m/Y', $date)->endOfDay();

            $max_magnitude[] = Monitoring::whereBetween('created_at', [$startDate, $endDate])->max('magnitude');
            // $min_magnitude[] = Monitoring::whereBetween('created_at', [$startDate, $endDate])->min('magnitude');
            $max_frekuensi[] = Monitoring::whereBetween('created_at', [$startDate, $endDate])->max('frekuensi');
            // $min_frekuensi[] = Monitoring::whereBetween('created_at', [$startDate, $endDate])->min('frekuensi');
        }


        // Per 30 Minutes
        $c_hour = Carbon::now()->format('H');
        $c_minute = Carbon::now()->format('i');
        $temp_hour = 0;
        $temp_minute = 0;

        if ($c_minute > 30) {
            $temp_hour = $c_hour - 2;
            $temp_minute = '30';
            $c_hour += 1;
        } else {
            $temp_hour = $c_hour - 3;
            $temp_minute = '00';
        }

        $labels2 = [];
        $max_magnitude2 = [];
        $max_frekuensi2 = [];

        for ($i = $temp_hour; $i < $c_hour; $i++) {
            $loopMinute = $temp_minute;

            for ($x = 0; $x < 2; $x++) {
                $e_hour = $loopMinute == '30' ? $i + 1 : $i;
                $e_minute = $loopMinute == '00' ? '30' : '00';

                $startTime = Carbon::createFromFormat('H:i:s',  $i . ':' . $loopMinute . ':' . '00');
                $endTime = Carbon::createFromFormat('H:i:s',  $e_hour . ':' . $e_minute . ':' . '00');

                $labels2[] = (string)$startTime->format('H:i:s');;
                $max_magnitude2[] = Monitoring::whereBetween('created_at', [$startTime, $endTime])->max('magnitude');
                $max_frekuensi2[] = Monitoring::whereBetween('created_at', [$startTime, $endTime])->max('frekuensi');

                if ($loopMinute == '30') {
                    $loopMinute = '00';
                    continue;
                } else {
                    $loopMinute = '30';
                }
            }
        }

        $dates = array_reverse($dates);
        $labels = array_reverse($labels);
        $labels2 = $labels2;
        $max_magnitude = array_reverse($max_magnitude);
        $max_frekuensi = array_reverse($max_frekuensi);
        $max_magnitude2 = $max_magnitude2;
        $max_frekuensi2 = $max_frekuensi2;

        return view('analytic', compact(
            'dates',
            'labels',
            'labels2',
            'max_magnitude',
            'max_frekuensi',
            'max_magnitude2',
            'max_frekuensi2',
        ));
    }

    // public function analytic1()
    // {
    //     $currentDate = Carbon::today();

    //     $timestamps = [];
    //     $labels = [];

    //     // Calculate timestamps and labels for the past 7 days
    //     for ($i = 0; $i < 7; $i++) {
    //         $timestamp = Carbon::now()->subDays($i)->startOfDay();
    //         $timestamps[] = $timestamp;
    //         $labels[] = $timestamp->format('d M');
    //     }

    //     $max_magnitude = [];
    //     $max_frekuensi = [];

    //     foreach ($timestamps as $timestamp) {
    //         $startTimestamp = $timestamp;
    //         $endTimestamp = $timestamp->copy()->addMinutes(30);

    //         $max_magnitude[] = Monitoring::whereBetween('created_at', [$startTimestamp, $endTimestamp])->max('magnitude');
    //         $max_frekuensi[] = Monitoring::whereBetween('created_at', [$startTimestamp, $endTimestamp])->max('frekuensi');
    //     }

    //     // Reversing the arrays to match the order
    //     $timestamps = array_reverse($timestamps);
    //     $labels = array_reverse($labels);
    //     $max_magnitude = array_reverse($max_magnitude);
    //     $max_frekuensi = array_reverse($max_frekuensi);

    //     return view('analytic', compact('labels', 'timestamps', 'max_magnitude', 'max_frekuensi'));
    // }

    public function half_magnitude()
    {
        $c_hour = Carbon::now()->format('H');
        $c_minute = Carbon::now()->format('i');
        $temp_hour = 0;
        $temp_minute = 0;

        if ($c_minute > 30) {
            $temp_hour = $c_hour - 2;
            $temp_minute = '30';
            $c_hour += 1;
        } else {
            $temp_hour = $c_hour - 3;
            $temp_minute = '00';
        }

        $labels = [];
        $max_magnitude = [];
        $max_frekuensi = [];

        for ($i = $temp_hour; $i < $c_hour; $i++) {
            $loopMinute = $temp_minute;

            for ($x = 0; $x < 2; $x++) {
                $e_hour = $loopMinute == '30' ? $i + 1 : $i;
                $e_minute = $loopMinute == '00' ? '30' : '00';

                $startTime = Carbon::createFromFormat('H:i:s',  $i . ':' . $loopMinute);
                $endTime = Carbon::createFromFormat('H:i:s',  $e_hour . ':' . $e_minute);

                $labels[] = (string)$startTime;
                $max_magnitude[] = Monitoring::whereBetween('created_at', [$startTime, $endTime])->max('magnitude');
                $max_frekuensi[] = Monitoring::whereBetween('created_at', [$startTime, $endTime])->max('frekuensi');

                if ($loopMinute == '30') {
                    $loopMinute = '00';
                    continue;
                } else {
                    $loopMinute = '30';
                }
            }
        }

        return view('analytic', compact('labels', 'max_magnitude', 'max_frekuensi'));
    }
}
