<?php

namespace App\Exports;

use App\Models\Monitoring;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class MagnitudeSwitchingExport implements FromCollection, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Menginialisasi array untuk menyimpan hasilnya
        $results = collect();
        $records = Monitoring::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->get(); // You need to fetch data from your database

        //Kondisi untuk mengambil data magnitude switching 
        foreach ($records as $record) {
            if ($record->magnitude < 220) {
                $results->push([
                    'time' => $record->created_at->format('d F Y H:i'),
                    'value' => $record->magnitude != 0 ? $record->magnitude : '0',
                ]);
            }
        }

        return $results;
    }

    // Mendeklarasikan hasil results menjadi Magnitude Switching
    public function title(): string
    {
        return 'Magnitude Switching';
    }
}
