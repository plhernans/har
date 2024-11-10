<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromGenerator;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class MftoExporta implements FromView
{
    protected $data;
    protected $ctd;

    public function __construct($data,$ctd)
    {
        $this->data = $data;
        $this->ctd = $ctd;
    }

    public function view():View{
        $data=$this->data;
        $ctd=$this->ctd;
        return view('exports.cmfto_aereo', compact(['data','ctd']));
    }
}
