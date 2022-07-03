<?php

namespace App\Exports;

use App\Models\DataKecamatan;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataKecamatanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataKecamatan::all();
    }
}
