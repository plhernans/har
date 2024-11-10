@inject('origenes', 'App\Services\Origenes')
@inject('embarques', 'App\Services\TipoEmbarques')
@inject('customers', 'App\Services\Customers')
@inject('paises', 'App\Services\Paises')
@inject('deliveries', 'App\Services\Delivery')
@inject('typeconts', 'App\Services\TypeCont')
@inject('typegoods', 'App\Services\TypeGoods')
@inject('vessel', 'App\Services\VvesselVoyage')

<ul class="nav nav-tabs" id="myTab" role="tabbooking">
    <li class="nav-item">
    <a class="nav-link active" id="nobooking-tab" data-toggle="tab" href="#booking" role="tab" aria-controls="booking" aria-selected="true">{{ __("General & Address") }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="ports-tab" data-toggle="tab" href="#ports" role="tab" aria-controls="ports" aria-selected="false">{{ __("Ports") }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="container-tab" data-toggle="tab" href="#container" role="tab" aria-controls="container" aria-selected="false">{{ __("Containers") }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="rates-tab" data-toggle="tab" href="#rates" role="tab" aria-controls="rates" aria-selected="false" hidden>{{ __("Rates") }}</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active p-0" id="booking" role="tabpanel" aria-labelledby="booking-tab">

        <div id="generaladdress" class="form-row">

            <div class="form-group col-sm-12">
                <input id="idreserva" class="form-control form-control-sm idreserva" type="text" hidden>
            </div>

            <div class="form-group col-sm-5 p-1">
                <label for="lblbkbuque"><strong>{{ __("Vessel") }}</strong></label>
                <select id="bkbuque" class="selectpicker show-menu-arrow form-control form-control-sm bkbuque" data-live-search="true" required>
                    @foreach ($vessel->getVessel() as $idbuque=>$buque)
                        <option data-tokens="{{ $idbuque }}" value="{{ $idbuque }}"> {{ $buque }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-5 ml-auto p-1">
                <label for="lblbkviaje"><strong>{{ __("Voyage") }}</strong></label>
                <select id="bkviaje" class="selectpicker show-menu-arrow form-control form-control-sm bkviaje" data-live-search="true" required>

                </select>
            </div>
            <div class="form-group col-sm-5 p-1">
                <label for="lblorigen"><strong>{{ __("Country of Request") }}</strong></label>
                <select id="txtorigen"
                        class="selectpicker show-menu-arrow form-control form-control-sm txtorigen"
                        data-live-search="true"
                        required>
                    @foreach ($origenes->getOrigenes() as $code=>$origen)
                        <option data-tokens="{{ $code }}" value="{{ $code }}"> {{ $origen }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-5 ml-auto p-1">
                <label for="lblembarque"><strong>{{ __("Type of Shipment") }}</strong></label>
                <select id="txtembarque"
                        class="selectpicker show-menu-arrow form-control form-control-sm txtembarque"
                        data-live-search="true"
                        required>
                    @foreach ($embarques->getTipoEmbarques() as $code=>$embarque)
                        <option data-tokens="{{ $code }}" value="{{ $code }}"> {{ $embarque }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-sm-5 p-1">
                <label for="lblshipper"><strong>{{ __("Shipper") }}</strong></label>
                <select id="bkshipper"
                        class="selectpicker show-menu-arrow form-control form-control-sm bkshipper"
                        data-live-search="true"
                        required>
                    @foreach ($customers->getCustomers() as $name=>$address)
                        <option data-tokens="{{ $address }}" value="{{ $address }}"> {{ $name }}</option>
                    @endforeach
                </select>
                <textarea row="5" id="bkshipperdir" class="form-control form-control-sm mt-1 bkshipperdir" required disabled></textarea>
            </div>
            <div class="form-group col-sm-5 ml-auto p-1">
                <label for="lblconsignee"><strong>{{ __("Consignee") }}</strong></label>
                <select id="bkconsignee"
                        class="selectpicker show-menu-arrow form-control form-control-sm bkconsignee"
                        data-live-search="true"
                        required>
                    @foreach ($customers->getCustomers() as $name=>$address)
                        <option data-tokens="{{ $address }}" value="{{ $address }}"> {{ $name }}</option>
                    @endforeach
                </select>
                <textarea row="5" id="bkconsigneedir" class="form-control form-control-sm mt-1 bkconsigneedir" required disabled></textarea>
            </div>
            <div class="form-group col-sm-5 p-1">
                <label for="lblnotify"><strong>{{ __("Notify") }}</strong></label>
                <select id="bknotify"
                        class="selectpicker show-menu-arrow form-control form-control-sm bknotify"
                        data-live-search="true"
                        required>
                    @foreach ($customers->getCustomers() as $name=>$address)
                        <option data-tokens="{{ $address }}" value="{{ $address }}"> {{ $name }}</option>
                    @endforeach
                </select>
                <textarea row="5" id="bknotifydir" class="form-control form-control-sm mt-1 bknotifydir" required disabled></textarea>
            </div>
            <div class="form-group col-sm-5 ml-auto p-1">
                <label for="lblnotifys"><strong>{{ __("Second Notify") }}</strong></label>
                <select id="bknotifys"
                        class="selectpicker show-menu-arrow form-control form-control-sm bknotifys"
                        data-live-search="true">
                    @foreach ($customers->getCustomers() as $name=>$address)
                        <option data-tokens="{{ $address }}" value="{{ $address }}"> {{ $name }}</option>
                    @endforeach
                </select>
                <textarea row="5" id="bknotifydirs" class="form-control form-control-sm mt-1 bknotifydirs" disabled></textarea>
            </div>
        </div>
    </div>

    <div class="tab-pane fade p-0" id="ports" role="tabpanel" aria-labelledby="ports-tab">
        <div id="fieldPorts" class="form-row mt-3">

                <div class="form-group col-sm-5 p-1">
                    <label for="lblpol"><strong>{{ __("Port of Loading") }}</strong></label>
                    <input type="text" id="txtpol" class="form-control form-control-sm txtpol" required>
                    <!--  <button type="button" class="btn btn-sm btn-dark col-sm-1 ml-1 btnPol"><span class="fa fa-search"></span></button> -->

                    <input type="text" id="txtidpol" class="txtidpol" disabled >
                </div>

                <div class="form-group col-sm-5 ml-auto p-1">
                    <label for="lblpod"><strong>{{ __("Port of Discharge") }}</strong></label>
                    <input type="text" id="txtpod" class="form-control form-control-sm txtpod" required>
                    <!--    <button type="button" class="btn btn-sm btn-dark col-sm-1 ml-1 btnPod"><span class="fa fa-search"></span></button> -->

                    <input type="text" id="txtidpod" class="txtidpod" disabled >
                </div>

                <div class="form-group col-sm-5 p-1">
                    <label for="lblpd"><strong>{{ __("Place of Delivery") }}</strong></label>
                    <input type="text" id="txtpd" class="form-control form-control-sm txtpd" required>
                    <!--     <button type="button" class="btn btn-sm btn-dark col-sm-1 ml-1 btnPd"><span class="fa fa-search"></span></button> -->

                    <input type="text" id="txtidpd" class="txtidpd" disabled >
                </div>

                <div class="form-group col-sm-5 ml-auto p-1">
                    <label for="lblpor"><strong>{{ __("Place of Receipt") }}</strong></label>
                    <input type="text" id="txtpor" class="form-control form-control-sm  txtpor">
                    <!--    <button type="button" class="btn btn-sm btn-dark col-sm-1 ml-1 btnPor"><span class="fa fa-search"></span></button> -->

                    <input type="text" id="txtidpor" class="txtidpor" disabled >
                </div>

            <!--PENDIENTE A REVISION DATA LIST -->
            <!-- <div class="form-group col-sm-5 mr-4">
                    <input id="testpol" class="form-control" list="testpollist">
                    <datalist id="testpollist">
                        <div id="ports"></div>
                    </datalist>
            </div> -->
        </div>
    </div>
    <div class="tab-pane fade pt-2 hidden" id="container" role="tabpanel" aria-labelledby="container-tab">

        <div id="fieldContainer" class="form-row mt-3">
        <div id="divNewContainer" class="form-row col-12" hidden>
            <div class="form-group col-sm-5 p-1">
                <label for="lblbkcont"><strong>{{ __("Container Number") }}</strong></label>
                <input id="txtbkCont" type="text" class="form-control form-control-sm txtbkCont">
            </div>
            <div class="form-group col-sm-5 ml-auto p-1">
                <label for="lblbktypecont"><strong>{{ __("Type of Equipment") }}</strong></label>
                <select id="txtbktypecont"
                        class="selectpicker show-menu-arrow form-control form-control-sm txtbktypecont"
                        data-live-search="true">
                    @foreach ($typeconts->getTypeCont() as $typecont=>$description)
                        <option data-tokens="{{ $typecont }}" value="{{ $typecont }}"> {{ $typecont.' - '.$description }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group col-sm-5 p-1">
                <label for="lblbktara"><strong>{{ __("Tara") }}</strong></label>
                <input id="txtbktara" class="form-control form-control-sm txtbktara" type="text">
            </div>
            <div class="form-group col-sm-5 ml-auto p-1">
                <label for="lblbkdescr"><strong>{{ __("Type of Goods") }}</strong></label>
                <select id="txtbkgooddescr"
                        class="selectpicker show-menu-arrow form-control form-control-sm txtbkgooddescr"
                        data-live-search="true"
                        >
                    @foreach ($typegoods->getTypeGoods() as $typegood=>$description)
                        <option data-tokens="{{ $typegood }}" value="{{ $typegood }}"> {{ $description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-5 p-1">
                <label for="lblbkgross"><strong>{{ __("Gross Weight") }}</strong></label>
                <input type="text" id="txtbkgross" class="form-control form-control-sm txtbkgross" type="text">
            </div>
            <div class="form-group col-sm-5 ml-auto p-1">
                <label for="lblbkseals"><strong>{{ __("Seals") }}</strong></label>
                <input type="text" id="txtbkseals" class="form-control form-control-sm txtbkseals" type="text">
            </div>
            <div class="form-group col-sm-5 mr-4">
                <label for="lbldelivery"><strong>{{ __("Movement") }}</strong></label>
                <select id="txtdelivery"
                        class="selectpicker show-menu-arrow form-control form-control-sm txtdelivery"
                        data-live-search="true"
                        >
                    @foreach ($deliveries->getDeliveries() as $iddelivery=>$delivery)
                        <option data-tokens="{{ $iddelivery }}" value="{{ $iddelivery }}"> {{ $delivery }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <table id="tableBkCont" class="col-12 col-lg-12 table table-bordered table-sm">
            <thead class="thead-dark">
                <tr>
                    <button type="button" id="btnbkNewCont" class="btn btn-sm btn-dark btnbkNewCont mb-1">{{ __("New") }}</button>
                    <button type="button" id="btnbkAddCont" class="btn btn-success btnbkAddCont mb-1" hidden><i class="fa fa-plus-square mr-1"></i>{{ __("Add") }}</button>
                </tr>
                <tr class="justify-content-between">
                    <th scope="col">{{ __("Equipment") }}</th>
                    <th scope="col">{{ __("Tara") }}</th>
                    <th scope="col">{{ __("Type") }}</th>
                    <th scope="col">{{ __("Type of Goods") }}</th>
                    <th scope="col" hidden>{{ __("idtype") }}</th>
                    <th scope="col">{{ __("Gross (KG)") }}</th>
                    <th scope="col">{{ __("Seals") }}</th>
                    <th scope="col">{{ __("Movement") }}</th>
                    <th scope="col" hidden>{{ __("idMovement") }}</th>
                    <th id="actioncontbk" scope="col" style="text-align: center">{{ __("Action") }}</th>
                   <!-- <th id="itemcontbl" scope="col" style="text-align: center" hidden>{{ __("Item") }}</th> -->
                </tr>
            </thead>
            <tbody id="tbodyBkCont">

            </tbody>
        </table>
    </div>
    <div class="tab-pane fade pt-2" id="rates" role="tabpanel" aria-labelledby="rates-tab">
        rates
    </div>
</div>
