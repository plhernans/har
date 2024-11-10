<div class="modal fade" id="modalDeleteFactura">
  <div class="modal-dialog">
    <div class="modal-content" id="modalDeleteFacturaContent">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 id="msgtitledeletef" class="modal-title text-white"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="row modal-body">

        <div class="col-12">
          <span id="msgerrordeletef"></span><br/><br />
            <div id="obsdeletef" class="group-inline" hidden>
                <label>Detalles de cancelacion</label>
                <input id="txtobsdelete" type="text" style="width: 220px" class="form-control">
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button id="modalDeleteYesF" type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Si')}}</button>
        <button id="modalDeleteNoF" type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('No')}}</button>
      </div>
    </div>
  </div>
</div>
