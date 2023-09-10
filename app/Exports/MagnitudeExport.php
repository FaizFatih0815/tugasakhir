<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\MagnitudeAverageExport;
use App\Exports\MagnitudeSwitchingExport;

//Membuat export dengan sheets tidak hanya satu
class MagnitudeExport implements WithMultipleSheets
{
    use Exportable;

    protected $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            'Magnitude Average' => new MagnitudeAverageExport(),
            'Magnitude Switching' => new MagnitudeSwitchingExport(),
        ];
    }
}
