<div class="modal modal-slide-in fade" id="tambah-param" aria-hidden="true">
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
            <select class="form-select" name="trial_machine_id" id="trial_machine_id">
              @foreach ($mesin as $mosin)
              <option value="{{ $mosin->id }}">{{ $mosin->machine_number }}</option>
              @endforeach
            </select>                                    
            <div class="mb-1">
              <label class="form-label">Setting</label>
              <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="mb-1">
              <label class="form-label">Parameter</label>
              <input id="parameter" name="parameter" class="form-control" type="number" />
            </div>
            <div class="mb-1">
              <label class="form-label">Ampere</label>
              <input class="form-control" id="ampere" name="ampere" rows="5" type="number">
            </div>
            <div class="d-flex flex-wrap mb-0">
              <button type="submit" class="btn btn-primary me-1" data-bs-dismiss="modal" id="storeparam" value="create">Send</button>
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('.tambahParam').click(function () {
      $('#tambah-param').modal('show');
      $('#modalHeading').html("Machine Parameter");
       $('#material-form').trigger("reset");
       $('#storeparam').val("create-data");
    });
    

  </script>