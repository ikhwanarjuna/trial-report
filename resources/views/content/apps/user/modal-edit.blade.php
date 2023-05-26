<div class="modal modal-slide-in fade" id="edit-material" aria-hidden="true">
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
              <input type="text" id="trial_id_edit" name="trial_id" class="form-control" value="" hidden>                                    
            <div class="mb-1">
              <label class="form-label">Kode Item</label>
              <input type="text" id="item_code_edit" name="item_code" class="form-control" value="">
            </div>
            <div class="mb-1">
              <label class="form-label">Nama Item</label>
              <input id="item_name_edit" name="item_name" class="form-control" type="text" value="" />
            </div>
            <div class="mb-1">
              <label class="form-label">Quantity (Zack)</label>
              <input class="form-control" id="qty_zack_edit" name="qty_zack" rows="5" type="number" value="">
            </div>
            <div class="mb-1">
              <label class="form-label">Quantity (Kg)</label>
              <input class="form-control" id="qty_kg_edit" name="qty_kg" rows="5" type="number" value="">
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
      console.log(id1);
      $.ajax({
        url: id1+'/edit',
        type: 'GET',
        dataType: 'json',
        cache: false,
        success: function(response){
          $('#id').val(response.id);
          $('#trial_id_edit').val(response.trial_id);
          $('#item_code_edit').val(response.item_code);
          $('#item_name_edit').val(response.item_name);
          $('#qty_zack_edit').val(response.qty_zack);
          $('#qty_kg_edit').val(response.qty_kg);
          $('#modalHeader').html("Edit Data");
          $('#edit-material').modal('show');
        }
      });
      });

    </script>