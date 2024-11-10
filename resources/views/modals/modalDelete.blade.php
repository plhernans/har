<div class="modal fade" id="modalDelete">
  <div class="modal-dialog">
    <div class="modal-content" id="modalDeleteContent">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 id="msgtitledelete" class="modal-title text-white"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="row modal-body">

        <div class="col-12">
          <span id="msgerrordelete"></span>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button id="modalDeleteYes" type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Si')}}</button>
        <button id="modalDeleteNo" type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('No')}}</button>
      </div>
    </div>
  </div>
</div>
