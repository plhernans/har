<?php

namespace App\Exports;

use App\Models\Vmanifiesto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadingRow
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            '#',
            'User',
            'Date',
        ];
    }
    
    public function collection()
    {
        return Vmanifiesto::all();
    }
}
