<div class="modal mt-5 fade" id="mBillFromBooking">
    <div id="mBillFromBookinggDialog" class="modal-dialog modal-lg-dialog mBillFromBooking">
        <div class="modal-content">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-0 p-0">
                <form id="formBillFB" class="formBillFB">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12 m-auto p-0">
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div id="titleFromBooking">{{ __("Booking Without Bill") }}</div>
                                    <button id="btnCloseFromBooking" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-sm-7 fbleft">
                                        <table class="table table-hover table-sm" id="tableFromBooking">
                                            <thead class="thead-light">
                                                <tr class="justify-content-between">
                                                    <th scope="col">{{ __("Vessel") }}</th>
                                                    <th scope="col">{{ __("Voyage") }}</th>
                                                    <th scope="col">{{ __("Booking Number") }}</th>
                                                    <th scope="col">{{ __("Shipper") }}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyFromBooking">

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-sm-5 fbright">
                                        <table class="table table-hover table-sm" id="tableContFromBooking">
                                            <thead class="thead-light">
                                                <tr class="justify-content-between">
                                                    <th scope="col"></th>
                                                    <th scope="col" hidden>{{ __("Booking") }}</th>
                                                    <th scope="col">{{ __("Equipment") }}</th>
                                                    <th scope="col">{{ __("Tara") }}</th>
                                                    <th scope="col">{{ __("Type") }}</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyContFromBooking">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div>
                                    <button id="btnNewBillFromBooking" type="button" class="btn btn-primary"><i class="fa fa-file mr-1"></i>From Booking</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
