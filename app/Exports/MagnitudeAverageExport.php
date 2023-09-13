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

        // Menginialisasi array untuk menyimpan hasilnya
        $results = collect();

        // Melakukan looping dari jam 00:00 sampai jam 23:59
        for ($hour = 0; $hour < 24; $hour++) {
            //Mengatur menit
            $hourCarbon = $currentDate->copy()->setTime($hour, 0, 0);

            // Merekam data rata rata nilai magnitude pada tabel monitoring
            $records = Monitoring::whereBetween('created_at', [$hourCarbon, $hourCarbon->copy()->addHour()->subMinute()])
                ->orderBy('created_at', 'desc')
                ->avg('magnitude');

            // Memasukkan data dari records kedalam array results
            $results->push([
                'time' => $hourCarbon->format('d F Y H:i'),
                'value' => $records ?? 0,
            ]);
        }

        return $results;
    }

    // Mendeklarasikan hasil results menjadi Magnitude Average
    public function title(): string
    {
        return 'Magnitude Average';
    }
}
