<div class="modal mt-5 fade" id="mReserva">
    <div id="mReservaDialog" class="modal-dialog modal-xl-dialog mReserva">
        <div class="modal-content">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

            @inject('origenes', 'App\Services\Origenes')
            @inject('embarques', 'App\Services\TipoEmbarques')
            @inject('customers', 'App\Services\Customers')
            @inject('paises', 'App\Services\Paises')
            @inject('delivery', 'App\Services\Delivery')

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                <form id="formBooking" class="formBooking" method="POST" action="{{ route('booking.store') }}">
                    @csrf
                    @include('partials._session-msg')
                    @include('reserva.mNewContainer')
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div id="titleBooking">{{ __("Booking") }}</div> <div id="noReserva" class="ml-auto noReserva">GL21DOM-EM00451</div>
                                </div>

                            </div>
                            <div class="card-body">

                                <ul class="nav nav-tabs" id="myTab" role="tabbooking">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="nobooking-tab" data-toggle="tab" href="#booking" role="tab" aria-controls="booking" aria-selected="true">{{ __("Booking") }}</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false">{{ __("Address") }}</a>
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
                                    <div class="tab-pane fade show active" style="height: 300px" id="booking" role="tabpanel" aria-labelledby="booking-tab">

                                        <div id="RequestNoReserva" class="form-row">
                                            <div class="form-group col-sm-12 mr-4">
                                                <input id="idreserva" class="form-control form-control-sm idreserva" type="text" hidden>
                                            </div>
                                            <div class="form-group col-sm-5 mr-4">
                                                <label for="lblbkbuque"><strong>{{ __("Vessel") }}</strong></label>
                                                <input type="text" id="bkbuque" class="form-control form-control-sm bkbuque" required disabled>

                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="lblbkviaje"><strong>{{ __("Voyage") }}</strong></label>
                                                <input type="text" id="bkviaje" class="form-control form-control-sm bkviaje" required disabled>

                                            </div>
                                            <div class="form-group col-sm-5 mr-4">
                                                <label for="lblorigen"><strong>{{ __("Origin") }}</strong></label>
                                                <select name="txtorigen"
                                                        class="selectpicker show-menu-arrow form-control form-control-sm txtorigen"
                                                        data-live-search="true"
                                                        required>
                                                    @foreach ($origenes->getOrigenes() as $code=>$origen)
                                                        <option data-tokens="{{ $code }}" value="{{ $code }}"> {{ $origen }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="lblembarque"><strong>{{ __("Type of Shipment") }}</strong></label>
                                                <select name="txtembarque"
                                                        class="selectpicker show-menu-arrow form-control form-control-sm txtembarque"
                                                        data-live-search="true"
                                                        required>
                                                    @foreach ($embarques->getTipoEmbarques() as $code=>$embarque)
                                                        <option data-tokens="{{ $code }}" value="{{ $code }}"> {{ $embarque }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-5 mr-4">
                                                <label for="lbldelivery"><strong>{{ __("Delivery Condition") }}</strong></label>

                                                <select name="txtdelivery"
                                                        class="selectpicker show-menu-arrow form-control form-control-sm txtdelivery"
                                                        data-live-search="true"
                                                        required>
                                                    @foreach ($delivery->getDelivery() as $iddelivery=>$delivery)
                                                        <option data-tokens="{{ $iddelivery }}" value="{{ $iddelivery }}"> {{ $delivery }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" style="height: 300px" id="address" role="tabpanel" aria-labelledby="address-tab">

                                        <div id="fieldAddress" class="form-row mt-3">
                                            <div class="form-group col-sm-5 mr-4">
                                                <label for="lblshipper"><strong>{{ __("Shipper") }}</strong></label>
                                                <select name="bkshipper"
                                                        class="selectpicker show-menu-arrow form-control form-control-sm bkshipper"
                                                        data-live-search="true"
                                                        required>
                                                    @foreach ($customers->getCustomers() as $name=>$address)
                                                        <option data-tokens="{{ $address }}" value="{{ $address }}"> {{ $name }}</option>
                                                    @endforeach
                                                </select>
                                                <textarea row="5" id="bkshipperdir" class="form-control form-control-sm mt-1 bkshipperdir" required disabled></textarea>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="lblconsignee"><strong>{{ __("Consignee") }}</strong></label>
                                                <select name="bkconsignee"
                                                        class="selectpicker show-menu-arrow form-control form-control-sm bkconsignee"
                                                        data-live-search="true"
                                                        required>
                                                    @foreach ($customers->getCustomers() as $name=>$address)
                                                        <option data-tokens="{{ $address }}" value="{{ $address }}"> {{ $name }}</option>
                                                    @endforeach
                                                </select>
                                                <textarea row="5" id="bkconsigneedir" class="form-control form-control-sm mt-1 bkconsigneedir" required disabled></textarea>
                                            </div>
                                            <div class="form-group col-sm-5 mr-4">
                                                <label for="lblnotify"><strong>{{ __("Notify") }}</strong></label>
                                                <select name="bknotify"
                                                        class="selectpicker show-menu-arrow form-control form-control-sm bknotify"
                                                        data-live-search="true"
                                                        required>
                                                    @foreach ($customers->getCustomers() as $name=>$address)
                                                        <option data-tokens="{{ $address }}" value="{{ $address }}"> {{ $name }}</option>
                                                    @endforeach
                                                </select>
                                                <textarea row="5" id="bknotifydir" class="form-control form-control-sm mt-1 bknotifydir" required disabled></textarea>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="lblnotifys"><strong>{{ __("2do Notify") }}</strong></label>
                                                <select name="bknotifys"
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
                                    <div class="tab-pane fade pt-2" style="height: 300px" id="ports" role="tabpanel" aria-labelledby="ports-tab">
                                        <div id="fieldPorts" class="form-row mt-3">

                                                <div class="form-group col-sm-5 mr-4">
                                                    <label for="lblpol"><strong>{{ __("Port of Loading") }}</strong></label>
                                                    <div class="row ml-0">
                                                        <input type="text" id="txtpol"
                                                            class="form-control form-control-sm col-sm-10 txtpol"
                                                            required
                                                        >
                                                      <!--  <button type="button" class="btn btn-sm btn-dark col-sm-1 ml-1 btnPol"><span class="fa fa-search"></span></button> -->
                                                    </div>
                                                    <input type="text" id="txtidpol" class="txtidpol" disabled hidden>
                                                </div>

                                                <div class="form-group col-sm-5 mr-4">
                                                    <label for="lblpod"><strong>{{ __("Port of Discharge") }}</strong></label>
                                                    <div class="row ml-0">
                                                        <input type="text" id="txtpod"
                                                                class="form-control form-control-sm col-sm-10 txtpod"
                                                                required>
                                                      <!--    <button type="button" class="btn btn-sm btn-dark col-sm-1 ml-1 btnPod"><span class="fa fa-search"></span></button> -->
                                                    </div>
                                                    <input type="text" id="txtidpod" class="txtidpod" disabled hidden>
                                                </div>

                                                <div class="form-group col-sm-5 mr-4">
                                                    <label for="lblpd"><strong>{{ __("Place of Delivery") }}</strong></label>
                                                    <div class="row ml-0">
                                                        <input type="text" id="txtpd"
                                                        class="form-control form-control-sm col-sm-10 txtpd"
                                                        required>
                                                     <!--     <button type="button" class="btn btn-sm btn-dark col-sm-1 ml-1 btnPd"><span class="fa fa-search"></span></button> -->
                                                    </div>


                                                    <input type="text" id="txtidpd" class="txtidpd" disabled hidden>
                                                </div>

                                                <div class="form-group col-sm-5 mr-4">
                                                    <label for="lblpor"><strong>{{ __("Place of Receipt") }}</strong></label>
                                                    <div class="row ml-0">
                                                        <input type="text" id="txtpor"
                                                                class="form-control form-control-sm col-sm-10 txtpor">
                                                      <!--    <button type="button" class="btn btn-sm btn-dark col-sm-1 ml-1 btnPor"><span class="fa fa-search"></span></button> -->
                                                    </div>
                                                    <input type="text" id="txtidpor" class="txtidpor" disabled hidden>
                                                </div>

                                               <!-- <div class="form-group col-sm-5 mr-4">
                                                    <input class="form-control" list=languages>
                                                    <datalist id=languages>
                                                        @foreach ($paises->getPaises() as $port=>$code)
                                                            <option data-tokens="{{ $code }}" value="{{$code.' - '.$port }}"></option>
                                                        @endforeach
                                                    </datalist>
                                                </div> -->
                                               <!-- <div class="form-group col-sm-6">
                                                    <label for="lblpod"><strong>{{ __("Port of Discharge") }}</strong></label>
                                                    <select name="txtpod"
                                                            class="selectpicker show-menu-arrow form-control form-control-sm txtpod"
                                                            data-live-search="true"
                                                            required>
                                                            @foreach ($paises->getPaises() as $port=>$code)
                                                            <option data-tokens="{{ $code }}" value="{{ $code }}"> {{ $port }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-5 mr-4">
                                                    <label for="lblpd"><strong>{{ __("Place of Delivery") }}</strong></label>
                                                    <select name="txtpd"
                                                            class="selectpicker show-menu-arrow form-control form-control-sm txtpd"
                                                            data-live-search="true"
                                                            required>
                                                        @foreach ($paises->getPaises() as $port=>$code)
                                                            <option data-tokens="{{ $code }}" value="{{ $code }}"> {{ $port }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="lblpor"><strong>{{ __("Place of Receipt") }}</strong></label>
                                                    <select name="txtpor"
                                                            class="selectpicker show-menu-arrow form-control form-control-sm txtpor"
                                                            data-live-search="true"
                                                            required>
                                                            @foreach ($paises->getPaises() as $port=>$code)
                                                            <option data-tokens="{{ $code }}" value="{{ $code }}"> {{ $port }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> -->

                                        </div>
                                    </div>
                                    <div class="tab-pane fade pt-2 hidden" style="height: 300px" id="container" role="tabpanel" aria-labelledby="container-tab">

                                      <!--  <div id="fieldAddress" class="form-row mt-3">
                                            <div class="form-group col-sm-5 mr-4">
                                                <label for="lblnocont"><strong>{{ __("Container Number") }}</strong></label>
                                                <input type="text" id="bkcontainer" class="form-control form-control-sm bkcontainer" required>

                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="lbltipocont"><strong>{{ __("Type of Container") }}</strong></label>
                                                <input type="text" id="bktypecont" class="form-control form-control-sm bktypecont" required>

                                            </div>
                                            <div class="form-group col-sm-5 mr-4">
                                                <label for="lbltar"><strong>{{ __("Tara") }}</strong></label>
                                                <input type="text" id="bktara" class="form-control form-control-sm bktara" required>

                                            </div>
                                            <div class="form-group col-sm-5">
                                                <label for="lblgross"><strong>{{ __("Gross Weight") }}</strong></label>
                                                <input type="text" id="bkgross" class="form-control form-control-sm bkgross" required>

                                            </div>
                                            <div class="form-group col-sm-5">
                                                <label for="lblseals"><strong>{{ __("Seals Number") }}</strong></label>
                                                <input type="text" id="bkseals" class="form-control form-control-sm bkseals" required>

                                            </div>
                                        </div> -->

                                        <table id="tableBkCont" class="col-12 col-lg-12 table table-bordered table-sm">
                                            <thead class="thead-light">
                                                <tr>
                                                    <button id="btnbkNewCont" class="btn btn-sm btn-outline-primary btnbkNewCont mb-1">{{ __("New") }}</button>
                                                </tr>
                                                <tr class="justify-content-between">
                                                    <th scope="col">{{ __("Container") }}</th>
                                                    <th scope="col">{{ __("Tara") }}</th>
                                                    <th scope="col">{{ __("Type") }}</th>
                                                    <th scope="col">{{ __("Type of Goods") }}</th>
                                                    <th scope="col">{{ __("Gross (KG)") }}</th>
                                                    <th scope="col">{{ __("Seals") }}</th>
                                                    <th scope="col" colspan="2" style="text-align: center"></th>

                                                </tr>
                                            </thead>
                                            <tbody id="tbodyBkCont">

                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="tab-pane fade pt-2" style="height: 300px" id="rates" role="tabpanel" aria-labelledby="rates-tab">
                                    </div>
                                  </div>

                            </div>
                            <div class="car-footer ml-auto mr-4">
                                <button id="btnSavedBooking" type="button" class="btn btn-sm btn-primary mb-2">{{ __("Save Booking") }}</button>
                                <button id="btnUpdadteBooking" type="button" class="btn btn-sm btn-outline-primary mb-2" hidden>{{ __("Update") }}</button>
                                <button id="btnClosdeBooking" type="button" class="btn btn-sm btn-danger mb-2">{{ __("Close") }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <a id="urlreservaupdate" href="{{ route('tccliente.update','') }}" hidden></a>
                <a id="urlgetport" href="{{ route('tcport.show','') }}" hidden></a>
            </div>

        </div>
    </div>
</div>
