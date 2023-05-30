<div class="modal modal-slide-in fade" id="tambah-mesin" aria-hidden="true">
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
              <label class="form-label">Nomor Mesin</label>
              <input type="text" id="machine_number" name="machine_number" class="form-control">
            </div>
            <div class="mb-1">
              <label class="form-label">Proses</label>
              <select class="form-select" name="process_id" id="process_id">
                @foreach ($proses as $pros)
                <option value="{{ $pros->id }}">{{ $pros->name }}</option>
                @endforeach
              </select>
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
      $('#tambah-mesin').modal('show');
      $('#modalHeading').html("Tambah Mesin");
       $('#material-form').trigger("reset");
       $('#store').val("create-mesin");
    });
    

  </script>