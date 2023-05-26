@extends('layouts/contentLayoutMaster')

@section('title', 'Data')

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
      <h4 class="card-title">List Data</h4>
      <div class="row">
        <div class="col-md-4 user_role"><a href="javascript:void(0)" class="btn btn-success" id="new-data">New Data</a></div>
        <div class="col-md-4 user_plan"></div>
        <div class="col-md-4 user_status"></div>
      </div>
    </div>
    <div class="card-datatable table-responsive pt-0">
      
      <table class="table table-bordered data-table">
        <thead class="table-light">
          <tr>
            <th>No</th>
            <th>Nomor Dokumen</th>
            <th>Tanggal Dokumen</th>
            <th>Trial Type</th>
            {{-- <th>Trial Note</th>
            <th>Kode Item</th>
            <th>Family Product</th>
            <th>Nama Item</th>
            <th>Size</th>
            <th>Note</th>
            <th>Disetujui Oleh</th>
            <th>Tanggal Disetujui</th>
            <th>Disetujui Oleh (Plant Head)</th>
            <th>Tanggal Disetujui (Plant Head)</th>
            <th>Disetujui Oleh (PPIC)</th>
            <th>Tanggal Disetujui (PPIC)</th>
            <th>Disetujui Oleh (GM)</th>
            <th>Tanggal Disetujui (GM)</th> --}}
            <th>Disetujui (Costing)</th>
            {{-- <th>Disetujui Oleh (Staff Costing)</th>
            <th>Disetujui Oleh (Costing)</th>
            <th>Tanggal Disetujui (Costing)</th> --}}
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <!-- Modal to add new user starts-->
    
      
        
         
            {{-- <div class="card-header">
              <h4 class="card-title">Form & Scrolling Modals</h4>
            </div> --}}
           
              
                
                  <!-- Button trigger modal -->
                  {{-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
                    Login Form
                  </button> --}}
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
                          <h4 class="modal-title" id="modalHeading">Tambah Data</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          
                        <div class="modal-body">
                          <form id="data-form" name="data-form">
                            @csrf
                            <div class="row">
                              <div class="col mb-1 form-group">
                              <label>Nomor Dokumen :</label>
                              <input type="text" placeholder="Nomor Dokumen" id="document_number" name="document_number" class="form-control" required >
                            </div>
                            <div class="col mb-1 form-group">    
                              <label>Tanggal</label>
                              <input type="text" placeholder="Tanggal" id="document_date" name="document_date" class="form-control flatpickr-basic" required>
                              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-document_date"></div>
                            </div>
                            <div class="col mb-1 form-group">
                            <label>Trial Type</label>
                            <select placeholder="Trial Type" id="trial_type" name="trial_type" class="form-control" >
                              <option value="1">Sample</option>
                              <option value="2">Sample Product</option>
                              <option value="3">Subtitusi Bahan</option>
                              <option value="4">New Formula</option>
                              <option value="5">Others</option>
                            </select>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-trial_type"></div>
                            </div>
                            </div>
                            
                            <div class="mb-1 form-group">
                            <label>Trial Note</label>
                            <textarea placeholder="Trial Note" id="trial_note" name="trial_note" class="form-control" ></textarea>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-trial_note"></div>
                            </div>

                            <div class="row">
                              <div class="mb-1 col form-group">
                              <label>Kode Item</label>
                              <input type="text" placeholder="Kode Item" id="item_code" name="item_code" class="form-control">
                              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-item_code"></div>
                              </div>

                              <div class="mb-1 col form-group">
                              <label>Family Product</label>
                              <input type="text" placeholder="Family Product" id="family_product" name="family_product" class="form-control">
                              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-family_product"></div>
                              </div>

                              <div class="mb-1 col form-group">
                              <label>Nama Item</label>
                              <input type="text" placeholder="Nama Item" id="item_name" name="item_name" class="form-control">
                              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-item_name"></div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="mb-1 col form-group">
                              <label>Ukuran</label>
                                <input type="text" placeholder="Ukuran" id="size" name="size" class="form-control">
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-size"></div>
                              </div>

                              <div class="mb-1 col form-group">
                              <label>Note</label>
                                <textarea placeholder="Note" id="note" name="note" class="form-control" ></textarea>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-note"></div>
                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="mb-1 col form-group">
                              <label>Disetujui Oleh</label>
                              <input type="text" placeholder="Disetujui Oleh" id="approval_created_by" name="approval_created_by" class="form-control">
                              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-approval_created_by"></div>
                              </div>

                              <div class="mb-1 col form-group">
                              <label>Tanggal Disetujui</label>
                              <input type="text" placeholder="Tanggal Disetujui" id="approval_created_date" name="approval_created_date" class="form-control form-control flatpickr-basic">
                              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-approval_created_date"></div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="mb-1 col form-group">
                              <label>Disetujui Oleh (Plant Head)</label>
                              <input type="text" placeholder="Disetujui Oleh (Plant Head)" id="approval_plant_head_name" name="approval_plant_head_name" class="form-control">
                              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-approval_plant_head_name"></div>
                              </div>

                              <div class="mb-1 col form-group">
                              <label>Tanggal Disetujui (Plant Head)</label>
                              <input type="text" placeholder="Tanggal Disetujui" id="approval_plant_head_date" name="approval_plant_head_date" class="form-control form-control flatpickr-basic">
                              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-approval_plant_head_date"></div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="mb-1 col form-group">
                              <label>Disetujui Oleh (PPIC)</label>
                              <input type="text" placeholder="Disetujui Oleh" id="approval_ppic_name" name="approval_ppic_name" class="form-control">
                              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-approval_ppic_name"></div>
                              </div>

                              <div class="mb-1 col form-group">
                              <label>Tanggal Disetujui (PPIC)</label>
                              <input type="text" placeholder="Tanggal Disetujui" id="approval_ppic_date" name="approval_ppic_date" class="form-control form-control flatpickr-basic">
                              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-approval_ppic_date"></div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="mb-1 col form-group">
                              <label>Disetujui Oleh (GM)</label>
                              <input type="text" placeholder="Disetujui Oleh" id="approval_gm_name" name="approval_gm_name" class="form-control">
                              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-approval_gm_name"></div>
                              </div>

                              <div class="mb-1 col form-group">
                              <label>Tanggal Disetujui (GM)</label>
                              <input type="text" placeholder="Tanggal Disetujui" id="approval_gm_date" name="approval_gm_date" class="form-control form-control flatpickr-basic">
                              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-approval_gm_date"></div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="mb-1 col form-group">
                              <label>Costing Staff</label>
                              <input type="text" placeholder="Costing Staff" class="form-control" id="costing_staff_name" name="costing_staff_name">
                              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-costing_staff_name"></div>
                              </div>

                              <div class="mb-1 col form-group">
                              <label>Disetujui Oleh (Costing)</label>
                              <input type="text" class="form-control" placeholder="Disetujui Oleh" id="costing_approval_name" name="costing_approval_name">
                              <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-costing_approval_name"></div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="mb-1 col form-group">
                                <label>Tanggal Disetujui (Costing)</label>
                                <input type="text" class="form-control form-control flatpickr-basic" placeholder="Tanggal Disetujui" id="costing_approval_date" name="costing_approval_date">
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-costing_approval_date"></div>
                                </div>
  
                                <div class="mb-1 col form-group">
                                  <label>Disetujui</label>
                                  <select id="costing_approved" class="form-control" name="costing_approved">
                                    <option value="0">Tidak Disetujui</option>
                                    <option value="1">Disetujui</option>
                                  </select>
                                  <div class="alert alert-danger mt-2 d-none" data-bs-dismiss="modal" role="alert" id="alert-costing_approved"></div>
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
    var statusObj = {
      0: { title: 'Pending', class: 'badge-light-danger' },
      1: { title: 'Disetujui', class: 'badge-light-success' },
    };
    var trialType = {
      1: {title: 'Sample'},
      2: {title: 'Sample Product'},
      3: {title: 'Subtitusi Bahan'},
      4: {title: 'New Formula'},
      5: {title: 'Other'}
    };

    // $('body').on('click', '#new-data', function () {

    // //open modal
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('app.index') }}",
      columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex'},
        {data:'document_number',name:'document_number', render: function(data, type, row, meta){
          return '<a style="font-family:montserrat;font-size:14px;font-weight:bold;" href="data/'+row.id+'">' + row.document_number + '</a>';},
        },
        {data:'document_date',name:'document_date'},
        {data:'trial_type',name:'trial_type', render: function(data, type, row, meta){
          return '<span>'+ trialType[row.trial_type].title + '</span>';
        },},
        {data:'costing_approved',name:'costing_approved', render: function(data, type, row, meta){
          return '<span class="badge rounded-pill ' + statusObj[row.costing_approved].class +'" text-capitalized>'+statusObj[row.costing_approved].title +'</span>';
        },},
        {data:'action',name:'action',orderable:false, searchable: false},
        
      ]
    });
    $('#new-data').click(function () {
      $('#new-data-modal').modal('show');
      // $('#store').val("create-data");
       $('#data-form').trigger("reset");
    });

    $('#store').click(function(e){
      e.preventDefault();
    

    let document_number = $('#document_number').val();
    let document_date = $('#document_date').val();
    let trial_type = $('#trial_type').val();
    let trial_note = $('#item_note').val();
    let item_code = $('#item_code').val();
    let family_product = $('#family_product').val();
    let item_name = $('#item_name').val();
    let size = $('#size').val();
    let note = $('#note').val();
    let approval_created_by = $('#approval_created_by').val();
    let approval_created_date = $('#approval_created_date').val();
    let approval_plant_head_name = $('#approval_plant_head_name').val();
    let approval_plant_head_date = $('#approval_plant_head_date').val();
    let approval_ppic_name = $('#approval_ppic_name').val();
    let approval_ppic_date = $('#approval_ppic_date').val();
    let approval_gm_name = $('#approval_gm_name').val();
    let approval_gm_date = $('#approval_gm_date').val();
    let costing_approved = $('#costing_approved').val();
    let costing_staff_name = $('#costing_staff_name').val();
    let costing_approval_name = $('#costing_approval_name').val();
    let costing_approval_date = $('#costing_approval_date').val();

    $.ajax({
      url: "{{ route('app.store') }}",
      type: "POST",
      dataType: 'json',
      data: {
        "document_number" : document_number,
        "document_date" : document_date,
        "trial_type" : trial_type,
        "trial_note" : trial_note,
        "item_code" : item_code,
        "family_product" : family_product,
        "item_name" : item_name,
        "size" : size,
        "note" : note,
        "approval_created_by" : approval_created_by,
        "approval_created_date" : approval_created_date,
        "approval_plant_head_name" : approval_plant_head_name,
        "approval_plant_head_date" : approval_plant_head_date,
        "approval_ppic_name" : approval_ppic_name,
        "approval_ppic_date" : approval_ppic_date,
        "approval_gm_name" : approval_gm_name,
        "approval_gm_date" : approval_gm_date,
        "costing_approved" : costing_approved,
        "costing_staff_name" : costing_staff_name,
        "costing_approval_name" : costing_approval_name,
        "costing_approval_date" : costing_approval_date,
      },
      success:function(response){
        Swal.fire({
          type : 'success',
          icon: 'success',
          title : `${response.message}`,
          showConfirmButton : false,
          timer : 3000
        });
        table.draw();
      },
      error:function(response){
        Swal.fire({
          type : 'error',
          icon: 'error',
          title: "Data Gagal Tersimpan.",
          showConfirmButton: false,
          timer : 3000
        });
      }, 
    });
  });


    $('body').on('click', '.deleteData', function () {
     
     var product_id = $(this).data("id");
     var result= confirm("Apakah yakin menghapus data?");
     
     if(result){
     $.ajax({
         type: "DELETE",
         url: "{{ route('app.store') }}"+'/'+product_id,
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
