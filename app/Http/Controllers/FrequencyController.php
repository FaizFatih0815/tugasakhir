<?php

namespace App\Http\Controllers;

use App\Exports\FrequencyExport;
use App\Models\Monitoring;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FrequencyController extends Controller
{
    public function frequency()
    {
        $currentDate = Carbon::today();

        // Menginisiasi array results
        $results = collect();

        // Melakukan looping dari jam 00.00 sampai 23.00
        for ($hour = 0; $hour < 24; $hour++) {
            // Mengatur jam dan menit
            $hourCarbon = $currentDate->copy()->setTime($hour, 0, 0);

            // Mengambil data nilai rata rata frekuensi
            $records = Monitoring::whereBetween('created_at', [$hourCarbon, $hourCarbon->copy()->addHour()->subMinute()])
                ->orderBy('created_at', 'desc')
                ->avg('frekuensi');

            // Menambahkan data pada results
            $results->push([
                'time' => $hourCarbon->format('d F Y H:i'),
                'value' => round($records, 1, PHP_ROUND_HALF_DOWN) ?? 0,
            ]);
        }

        $perPage = 6; // Jumlah halaman paginasi
        $page = request()->get('page', 1); // Menampilkan halaman pertama
        $paginatedResults = new \Illuminate\Pagination\LengthAwarePaginator(
            $results->forPage($page, $perPage),
            $results->count(),
            $perPage,
            $page,
            ['path' => request()->url()] // URL link paginasi
        );

        return view('frequency', compact('paginatedResults'));
    }

    public function export()
    {
        return Excel::download(new FrequencyExport, 'Frequency.xlsx');
    }
}
