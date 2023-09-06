<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnalyticController extends Controller
{
    public function analytic()
    {


        // Per 10 Minutes
        $c_hour = Carbon::now()->format('H');
        $c_minute = Carbon::now()->format('i');
        $temp_hour = 0;
        $temp_minute = 0;


        if ($c_minute[0] == '0') {
            // $temp_hour = $c_hour;
            $temp_hour = '0' . $c_hour[1] - 1;
            $temp_minute = '00';
        } else {
            if ($c_hour[0] == '0') {
                $temp_hour = '0' . $c_hour[1] - 1;
            } else {
                $temp_hour = strval($c_hour - 1);
            }

            $temp_minute = $c_minute - $c_minute[1];
            $temp_minute = strval($temp_minute);
        }

        $labels = [];
        $avg_magnitude = [];
        $avg_frekuensi = [];

        for ($x = 0; $x < 6; $x++) {
            $plusTenMinutes = $temp_minute == '00' ? '10' : strval($temp_minute + 10);

            $startTime = Carbon::createFromFormat('H:i:s',  $temp_hour . ':' . $temp_minute . ':' . '00');
            $endTime = Carbon::createFromFormat('H:i:s',  $temp_hour . ':' . $plusTenMinutes . ':' . '00');

            $labels[] = (string)$startTime->format('H:i:s');
            $avg_magnitude[] = Monitoring::whereBetween('created_at', [$startTime, $endTime])->avg('magnitude');
            $avg_frekuensi[] = Monitoring::whereBetween('created_at', [$startTime, $endTime])->avg('frekuensi');

            if ($temp_minute < 50) {
                $temp_minute = $temp_minute == '00' ? strval($temp_minute[1] + 10) : strval($temp_minute + 10);
            } else {
                $temp_minute = '00';
                if ($temp_hour[0] == '0') {
                    $temp_hour = '0' . $temp_hour[1] + 1;
                } else {
                    $temp_hour = strval($temp_hour + 1);
                }
            }
        }


        $labels = $labels;
        $avg_magnitude = $avg_magnitude;
        $avg_frekuensi = $avg_frekuensi;

        return view('analytic', compact(
            'labels',
            'avg_magnitude',
            'avg_frekuensi',
        ));
    }
}
