<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromGenerator;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class OrdenExportExcel implements FromView
{
    protected $data;
    protected $ctdFacturada;
    protected $rsPdtefacturap;
    protected $embarque;
    protected $master;
    protected $estadof;
    protected $estadoo;
    protected $cantTotal;

    public function __construct($rs,$rsFacturadap,$rsPdtefacturap,$embarquep,$masterp,$estadofp,$estadoop,$cantTotalp)
    {
        $this->data = $rs;
        $this->ctdFacturada = $rsFacturadap;
        $this->rsPdtefactura = $rsPdtefacturap;
        $this->embarque = $embarquep;
        $this->master = $masterp;
        $this->estadof = $estadofp;
        $this->estadoo = $estadoop;
        $this->cantTotal=$cantTotalp;
    }

    public function view():View{
        $data=$this->data;
        $ctdFacturada=$this->ctdFacturada;
        $rsPdtefactura=$this->rsPdtefactura;
        $embarque=$this->embarque;
        $master=$this->master;
        $estadof=$this->estadof;
        $estadoo=$this->estadoo;
        $cantTotal=$this->cantTotal;

        return view('ordenes.reportelistadoordenes', compact(['data','ctdFacturada','rsPdtefactura','embarque','master','estadof','estadoo','cantTotal']));
    }
}
