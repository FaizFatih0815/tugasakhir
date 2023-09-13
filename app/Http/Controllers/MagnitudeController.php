<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MagnitudeExport;

class MagnitudeController extends Controller
{
    public function magnitude()
    {
        $currentDate = Carbon::today();

        // Menginisiasi array results
        $results = collect();

        // Melakukan looping dari jam 00.00 sampai 23.00
        for ($hour = 0; $hour < 24; $hour++) {
            // Mengatur jam dan menit
            $hourCarbon = $currentDate->copy()->setTime($hour, 0, 0);

            // Mengambil data nilai rata rata magnitude
            $records = Monitoring::whereBetween('created_at', [$hourCarbon, $hourCarbon->copy()->addHour()->subMinute()])
                ->orderBy('created_at', 'desc')
                ->avg('magnitude');

            // Menambahkan data pada results
            $results->push([
                'time' => $hourCarbon->format('d F Y H:i'),
                'value' => round($records, 1, PHP_ROUND_HALF_DOWN) ?? 0,
            ]);
        }

        $perPage = 6; // Jumlah halaman paginasi
        $page = request()->get('page', 1); // Menapilkan halaman pertama
        $paginatedResults = $this->pagination(
            $results,
            $page,
            $perPage,
        );

        $paginatedResults->withQueryString()->setPageName('page'); // Menentukan nama page

        // Mengambil data pada tabel monitoring
        $records = Monitoring::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->get();

        // Menginisiasi array filteredresults
        $filteredResults = [];

        foreach ($records as $record) {
            // Pendataan nilai magnitude dibawah 220
            if ($record->magnitude < 220) {
                // Memasukkan data kedalam filteredresults
                $filteredResults[] = [
                    'time_switch' => $record->created_at,
                    'value_switch' => $record->magnitude,
                ];
            }
        }

        $perPageSwitch = 5; // Jumlah halaman paginasi
        $pageSwitch = request()->get('page-switch', 1); // Menampilkan halaman pertama
        $filteredResults = collect($filteredResults);

        $paginatedResults_Switch = $this->pagination(
            $filteredResults,
            $pageSwitch,
            $perPageSwitch,
        );

        $paginatedResults_Switch->withQueryString()->setPageName('page-switch');

        return view(
            'magnitude',
            compact(
                'paginatedResults',
                'paginatedResults_Switch'
            )
        );
    }

    public function pagination($results, $page, $perPage)
    {
        $paginatedResults = new \Illuminate\Pagination\LengthAwarePaginator(
            $results->forPage($page, $perPage),
            $results->count(),
            $perPage,
            $page,
            ['path' => request()->url()] // URL link paginasi
        );

        return $paginatedResults;
    }

    public function export()
    {
        return Excel::download(new MagnitudeExport(2018), 'Magnitude.xlsx');
    }
}
