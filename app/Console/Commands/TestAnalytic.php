<?php

namespace App\Console\Commands;

use App\Models\Monitoring;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TestAnalytic extends Command
{
    /**``
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:analytic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
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

                $startTime = Carbon::createFromFormat('H:i:s',  $i . ':' . $loopMinute . ':' . '00');
                $endTime = Carbon::createFromFormat('H:i:s',  $e_hour . ':' . $e_minute . ':' . '00');

                $labels[] = (string)$startTime;
                $max_magnitude[] = Monitoring::whereBetween('created_at', [$startTime, $endTime])->max('magnitude');
                $max_frekuensi[] = Monitoring::whereBetween('created_at', [$startTime, $endTime])->max('frekuensi');

                if ($loopMinute == '30') {
                    $loopMinute = '00';
                    continue;
                } else {
                    $loopMinute = '30';
                }
                // $loopMinute = $loopMinute == '30' ? '00' : '30';
            }
        }

        print_r($max_magnitude);
        // print_r($max_frekuensi);
        // print_r($labels);
    }
}
