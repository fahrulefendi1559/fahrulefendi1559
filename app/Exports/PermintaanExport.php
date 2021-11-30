<?php

namespace App\Exports;

use App\Permintaan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PermintaanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Permintaan::all();
    }
}
