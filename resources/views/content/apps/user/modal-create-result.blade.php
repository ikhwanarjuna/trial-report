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
              <label class="form-label">Criteria</label>
                <select class="form-select" name="criteria_id" id="criteria_id">
                  @foreach ($criteria as $crit)
                  <option value="{{ $crit->name }}">{{ $crit->name }}</option>
                  @endforeach
                </select>
              </div>                                   
            <div class="mb-1">
              <label class="form-label">Standart</label>
              <input id="standart" name="standart" class="form-control" type="text" />
            </div>
            <div class="mb-1">
              <label class="form-label">Actual</label>
              <input class="form-control" id="actual" name="actual" rows="5" type="text">
            </div>
            <div class="mb-1">
              <label class="form-label">Approved</label>
              <select class="form-select" name="approved" id="approved">
                <option value=0>Pending</option>
                <option value=1>Approved</option>
              </select>
            </div>
            <div class="d-flex flex-wrap mb-0">
              <button type="submit" class="btn btn-primary me-1" data-bs-dismiss="modal" id="storeRes" value="create">Send</button>
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('#tambah-result').click(function () {
      $('#tambah-komposisi').modal('show');
      $('#modalHeading').html("Tambah Result");
       $('#material-form').trigger("reset");
       $('#storeRes').val("create-data");
    });
    

  </script>