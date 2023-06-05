@extends('layouts/contentLayoutMaster')

@section('title', 'Criteria List')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
@endsection

@section('content')
<!-- users list start -->
<section class="app-user-list">
  <!-- list and filter start -->
  <div class="card">
    <div class="card-body border-bottom">
      <h4 class="card-title">Criteria List</h4>
      <div class="row">
        <div class="col-md-4 user_role"><a href="javascript:void(0)" class="btn btn-success" id="new-data">New Criteria</a></div>
        <div class="col-md-4 user_plan"></div>
        <div class="col-md-4 user_status"></div>
      </div>
    </div>
    <div class="card-datatable table-responsive pt-0">
      
      <table class="table table-bordered data-table">
        <thead class="table-light">
          <tr>
            <th>No</th>
            <th>Kriteria</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <!-- Modal to add new user starts-->
                  <!-- Modal -->
                  <div
                    class="modal fade text-start"
                    id="new-data-modal"
                    tabindex="-1"
                    aria-labelledby="modalHeading"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="modalHeading">Tambah Kriteria</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          
                        <div class="modal-body">
                          <form id="data-form" name="data-form">
                            @csrf
                            <div class="row">
                              <div class="col mb-1 form-group">
                              <label>Kriteria</label>
                              <input type="text" placeholder="Kriteria" id="name" name="name" class="form-control" required >
                            </div>
                            </div>                            
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="store" id="store">Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  {{-- modal edit --}}
                  <div
                    class="modal fade text-start"
                    id="edit-modal"
                    tabindex="-1"
                    aria-labelledby="modalHeading"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="modalHeading">Edit Criteria</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          
                        <div class="modal-body">
                          <form id="data-form" name="data-form">
                            @csrf
                            <div class="row">
                            <input type="text" id="id" name="id" class="form-control" value="" hidden>
                              <div class="col mb-1 form-group">
                              <label>Kriteria</label>
                              <input type="text" placeholder="Nama Proses" id="name_edit" name="name" class="form-control" required >
                            </div>
                            </div>                            
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="update">Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
          
{{-- <!-- list and filter end --> --}}
</section>
<!-- users list ends -->
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  {{-- <script src="{{ asset(mix('js/scripts/pages/app-user-list.js')) }}"></script> --}}
  <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-list.js')) }}"></script>
  <script type="text/javascript">
  $(function(){

    // //open modal
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('criteria.index') }}",
      columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex'},
        {data:'name',name:'name'},
        {data:'action',name:'action',orderable:false, searchable: false},
        
      ]
    });
    $('#new-data').click(function () {
    $('#new-data-modal').modal('show');
    $('#data-form').trigger("reset");
    });

    $('#store').click(function(e){
      e.preventDefault();
    

    let name = $('#name').val();

    $.ajax({
      url: "{{ route('criteria.store') }}",
      type: "POST",
      dataType: 'json',
      data: {
        "name" : name,
      },
      success:function(response){
        Swal.fire({
          icon: 'success',
          title : "Data Berhasil Tersimpan.",
          showConfirmButton : false,
          timer : 3000
        });
        table.draw();
      },
      error:function(response){
        Swal.fire({
          icon: 'error',
          title: "Data Gagal Tersimpan.",
          showConfirmButton: false,
          timer : 3000
        });
      }, 
    });
  });

  $('body').on('click', '.editData', function () {
      let id1 = $(this).data('id');
      console.log(id1);
      $.ajax({
        url: 'criteria/'+id1+'/edit',
        type: 'GET',
        dataType: 'json',
        cache: false,
        success: function(response){
          $('#id').val(response.id);
          $('#name_edit').val(response.name);
          $('#edit-modal').modal('show');
        }
      });
    });

    $('#update').click(function(e){
        e.preventDefault();
        let id = $('#id').val();
        let name = $('#name_edit').val();
        $.ajax({
            url : 'criteria/'+id,
            type: 'PUT',
            cache: false,
            data: {
                "name" : name,
            },
            success:function(response){
                Swal.fire({
                    icon: 'success',
                    title: `${response.success}`,
                    timer: 3000
                });
                table.draw();
            },
            error:function(response){
                Swal.fire({
                    icon: 'error',
                    title: "Data gagal dirubah!.",
                    timer: 3000
                });
            }
        });
    });


    $('body').on('click', '.deleteData', function () {
     
     var id = $(this).data("id");
     var result= confirm("Apakah yakin menghapus data?");
     
     if(result){
     $.ajax({
         type: "DELETE",
         url: "{{ route('criteria.store') }}"+'/'+id,
         success: function (data) {
          Swal.fire({
          type : 'success',
          icon: 'success',
          title : "Data Berhasil Dihapus.",
          showConfirmButton : false,
          timer : 3000
        });
             table.draw();
         },
         error: function (data) {
             console.log('Error:', data);
         }
     });
 }else{
  return false;
 }
 });   
});
  </script>
  

@endsection
