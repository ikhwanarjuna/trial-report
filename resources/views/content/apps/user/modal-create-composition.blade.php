<div class="modal modal-slide-in fade" id="tambah-komposisi" aria-hidden="true">
    <div class="modal-dialog sidebar-lg">
      <div class="modal-content p-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title align-middle" id="modalHeading">
            <span class="align-middle"></span>
          </h5>
        </div>
        <div class="modal-body flex-grow-1">
          <form id="material-form">
            @csrf
              <input type="text" id="trial_id" name="trial_id" class="form-control" value="{{ $data->id }}" hidden>                                    
            <div class="mb-1">
              <label class="form-label">Kode Item</label>
              <input type="text" id="item_code" name="item_code" class="form-control">
            </div>
            <div class="mb-1">
              <label class="form-label">Nama Item</label>
              <input id="item_name" name="item_name" class="form-control" type="text" />
            </div>
            <div class="mb-1">
              <label class="form-label">Tonase</label>
              <input class="form-control" id="tonase" name="tonase" rows="5" type="number">
            </div>
            <div class="mb-1">
              <label class="form-label">Percentage</label>
              <input class="form-control" id="percentage" name="percentage" rows="5" type="number">
            </div>
            <div class="d-flex flex-wrap mb-0">
              <button type="submit" class="btn btn-primary me-1" data-bs-dismiss="modal" id="store" value="create">Send</button>
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('#new-material').click(function () {
      $('#tambah-komposisi').modal('show');
      $('#modalHeading').html("Tambah Komposisi");
       $('#material-form').trigger("reset");
       $('#store').val("create-data");
    });
    

  </script>