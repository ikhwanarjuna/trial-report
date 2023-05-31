<div class="modal modal-slide-in fade" id="edit-parameter" aria-hidden="true">
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
              <input type="text" id="trial_machine_id_edit" name="trial_machine_id" class="form-control" value="" hidden>                                    
            <div class="mb-1">
              <label class="form-label">Setting</label>
              <input type="text" id="name_edit" name="name" class="form-control" value="">
            </div>
            <div class="mb-1">
              <label class="form-label">Parameter</label>
              <input id="parameter_edit" name="parameter" class="form-control" type="text" value="" />
            </div>
            <div class="mb-1">
              <label class="form-label">Ampere</label>
              <input class="form-control" id="ampere_edit" name="ampere" rows="5" type="number" value="">
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
    $('body').on('click', '.editData', function () {
      let id1 = $(this).data('id');
      $.ajax({
        url: id1+'/edit',
        type: 'GET',
        dataType: 'json',
        cache: false,
        success: function(response){
          $('#id').val(response.id);
          $('#trial_machine_id_edit').val(response.trial_machine_id);
          $('#name_edit').val(response.name);
          $('#parameter_edit').val(response.parameter);
          $('#ampere_edit').val(response.ampere);
          $('#modalHeader').html("Edit Parameter");
          $('#edit-parameter').modal('show');
        }
      });
      });

    </script>