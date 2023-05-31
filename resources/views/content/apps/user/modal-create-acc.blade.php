<div class="modal modal-slide-in fade" id="tambah-hasil" aria-hidden="true">
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
            <div class="mb-1">
            <label class="form-label">Nomor Mesin</label>
            <select class="form-select" name="trial_machine_id" id="trial_machine_id">
                @foreach ($mesin as $mosin)
                <option value="{{ $mosin->id }}">{{ $mosin->machine_number }}</option>
                @endforeach
              </select> 
            </div>                                        
            <div class="mb-1">
              <label class="form-label">Hasil/Shift(Kg)</label>
              <input type="text" id="result_per_shift_in_kg" name="result_per_shift_in_kg" class="form-control">
            </div>
            <div class="mb-1">
              <label class="form-label">Nama Item</label>
              <input id="item_name" name="item_name" class="form-control" type="text" />
            </div>
            <div class="mb-1">
              <label class="form-label">Waste(Kg)</label>
              <input class="form-control" id="waste_in_kg" name="waste_in_kg" rows="5" type="number">
            </div>
            <div class="mb-1">
              <label class="form-label">Waste Target(%)</label>
              <input class="form-control" id="waste_target_in_percent" name="waste_target_in_percent" rows="5" type="number">
            </div>
            <div class="mb-1">
                <label class="form-label">Ampere</label>
                <input class="form-control" id="ampere" name="ampere" rows="5" type="number">
              </div>
              <div class="mb-1">
                <label class="form-label">Operator</label>
                <input class="form-control" id="operator_number" name="operator_number" rows="5" type="text">
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
      $('#tambah-hasil').modal('show');
      $('#modalHeading').html("Tambah Hasil");
       $('#material-form').trigger("reset");
       $('#store').val("create-data");
    });
    

  </script>