<div class="modal mt-5 fade" id="mFindPort">
    <div id="mFindPortDialog" class="modal-dialog modal-lg-dialog mFindPort">
        <div class="modal-content">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">

                    @include('partials._session-msg')
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card ">
                            <div class="card-body p-0">
                                <table id="tableFindPort" class="col-12 col-lg-12 table table-hover table-sm">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="4">
                                                <div class="row col-12">
                                                    <input type="text" class="form-control form-control-sm col-4 txtSearchPort" autofocus>
                                                <button type="button" class="btn btn-sm btn-outline-light ml-2 btnSearchPort"><span class="fa fa-search"></span></button>
                                                </div>

                                            </th>
                                        </tr>
                                        <tr class="justify-content-between">
                                            <th scope="col">{{ __("Id") }}</th>
                                            <th scope="col">{{ __("Country") }}</th>
                                            <th scope="col">{{ __("Port") }}</th>
                                            <th scope="col">{{ __("Code") }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableTcPortBody">
                                        <!-- <tr>
                                            <td id="tdguestname" class="rowtdportBooking">ALEMANIA</td>
                                            <td id="tdguestlastname" class="rowtdportBooking">HAMBURGO</td>
                                            <td id="tdguestnationality" class="rowtdportBooking">DEHAM</td>
                                            <td id="tdguestpassport" class="rowtdportBooking">yES</td>
                                        </tr>  -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="car-footer ml-auto mr-4">
                                <button type="button" class="btn btn-sm btn-danger mb-2 btnCloseFindPort">{{ __("Cerrar") }}</button>
                            </div>
                        </div>
                    </div>

                <a id="urlgetport" href="{{ route('getport') }}" hidden></a>
            </div>
        </div>
    </div>
</div>
