<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromGenerator;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;

class MftoExportf implements FromView
{
    protected $data;
    protected $ctdEmitida;
    protected $dataTotal;
    protected $ctdCancelada;
    protected $cantTotal;
    protected $embarque;
    protected $fechadesde;
    protected $fechahasta;
    protected $nfactura;
    protected $estado;
    protected $concepto;

    public function __construct($rs,$rsCountEmitida,$rsTotalFactura,$rsCountCancelada,$cantTotalrs,$embarquep,$fechadesdep,$fechahastap,$nfacturap,$estadop,$conceptop)
    {
        $this->data = $rs;
        $this->ctdEmitida = $rsCountEmitida;
        $this->dataTotal = $rsTotalFactura;
        $this->ctdCancelada = $rsCountCancelada;
        $this->cantTotal = $cantTotalrs;
        $this->embarque = $embarquep;
        $this->fechadesde = $fechadesdep;
        $this->fechahasta=$fechahastap;
        $this->nfactura=$nfacturap;
        $this->estado=$estadop;
        $this->concepto=$conceptop;
    }

    public function view():View{
        $data=$this->data;
        $ctdEmitida=$this->ctdEmitida;
        $dataTotal=$this->dataTotal;
        $ctdCancelada=$this->ctdCancelada;
        $cantTotal=$this->cantTotal;
        $embarque=$this->embarque;
        $fechadesde=$this->fechadesde;
        $fechahasta=$this->fechahasta;
        $nfactura=$this->nfactura;
        $estado=$this->estado;
        $concepto=$this->concepto;

        return view('Facturas.reportelistadofacturas', compact(['data','ctdEmitida','dataTotal','ctdCancelada','cantTotal','embarque','fechadesde','fechahasta','nfactura','estado','concepto']));
    }
}
