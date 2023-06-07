<div class="modal modal-slide-in fade" id="edit-result" aria-hidden="true">
    <div class="modal-dialog sidebar-lg">
      <div class="modal-content p-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title align-middle" id="modalHeader">
          </h5>
        </div>
        <div class="modal-body flex-grow-1">
          <form id="edit-form">
              @csrf   
              <input type="text" id="id" name="id" class="form-control" value="" hidden>
              <input type="text" id="trial_id_edit" name="trial_id" class="form-control" value="{{ $data->id }}" hidden> 
              <div class="mb-1">
              <label class="form-label">Criteria</label>
                <select class="form-select" name="criteria_id" id="criteria_id_edit">
                  @foreach ($criteria as $crit)
                  <option value="{{ $crit->name }}">{{ $crit->name }}</option>
                  @endforeach
                </select>
              </div>                                   
            <div class="mb-1">
              <label class="form-label">Standart</label>
              <input id="standart_edit" name="standart" class="form-control" type="text" />
            </div>
            <div class="mb-1">
              <label class="form-label">Actual</label>
              <input class="form-control" id="actual_edit" name="actual" rows="5" type="text">
            </div>
            <div class="mb-1">
              <label class="form-label">Approved</label>
              <select class="form-select" name="approved" id="approved_edit">
                <option value=0>Pending</option>
                <option value=1>Approved</option>
              </select>
            </div>
            <div class="d-flex flex-wrap mb-0">
              <button type="submit" class="btn btn-primary me-1" data-bs-dismiss="modal" id="update" value="create">Update</button>
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('body').on('click', '.editResult', function () {
      let id1 = $(this).data('id');
      console.log(id1);
      $.ajax({
        url: "{{ route('acceptance.edits',$data->id) }}",
        type: 'GET',
        dataType: 'json',
        cache: false,
        success: function(response){
          $('#id').val(response.id);
          $('#trial_edit').val(response.trial_id);
          $('#criteria_id_edit').val(response.criteria_id);
          $('#standart_edit').val(response.standart);
          $('#actual_edit').val(response.actual);
          $('#approved_edit').val(response.approved);
          $('#modalHeader').html("Edit Acceptance");
          $('#edit-result').modal('show');
        }
      });
      });

    </script>