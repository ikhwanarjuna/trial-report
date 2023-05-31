@extends('layouts/contentLayoutMaster')

@section('title', 'Detail Data')

@section('vendor-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
@endsection

@section('content')
<section class="app-user-view-account">
  <div class="row">
    <!-- User Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
      <div class="col mb-2 md-4"><a href="javascript:void(0)" class="btn btn-success" id="new-material">Tambah Mesin</a></div>
      <!-- User Card -->
      <div class="card">
        <div class="card-body"> 
          <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
          <div class="info-container">
            <ul class="list-unstyled">
              <li class="mb-75">
                
                 {{-- @foreach ($data as $data) --}}
                <span class="fw-bolder me-25">Nomor :</span>
                <span><b>{{ $data->document_number }}</b></span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Tanggal Trial :</span>
                <span>{{ $data->document_date }}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Nama Produk :</span>
                <span>{{ $data->item_name }}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Size :</span>
                <span>{{ $data->size }}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Keterangan :</span>
                <span>{{ $data->note }}</span>
              </li>
              <li class="mb-75">
                <span class="fw-bolder me-25">Status</span>
                @if ($data->costing_approved == false)
                  <span class="badge bg-light-danger">Pending</span>
                @else
                  <span class="badge bg-light-success">Disetujui</span>
                  @endif
              </li>
          </div>
        </div>
      </div>
    </div>
    <!-- User Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
      <!-- User Pills -->
      <ul class="nav nav-pills mb-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('material.index',$data->id) }}">
            <i data-feather="cpu" class="font-medium-1 me-50"></i>
            <span class="fw-bold">Trial Material</span></a>
        </li>
        <li class="nav-item" hidden>
          <a class="nav-link" href="{{asset('app/user/view/security')}}">
            <i data-feather="lock" class="font-medium-1 me-50"></i>
            <span class="fw-bold">Trial Approval</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('composition.index',$data->id) }}">
            <i data-feather="layers" class="font-medium-1 me-50"></i>
            <span class="fw-bold">Composition</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('machine.index',$data->id) }}">
            <i data-feather="zap" class="font-medium-1 me-50"></i><span class="fw-bold">Trial Machine</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('acceptance.index', $data->id) }}">
            <i data-feather="link" class="font-medium-1 me-50"></i><span class="fw-bold">Acceptance</span>
          </a>
        </li>
      </ul>
      <!--/ User Pills -->

      <!-- Project table -->
      <div class="card">
        <h4 class="card-header">Trial Machine</h4>
        <div class="table-responsive">
          @foreach ($mesin as $msn)
          <table class="table datatable-project">
            <thead>
              <b>Nomor Mesin: {{ $msn->machine_number }}</b>
              <a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{ $msn->id }}" data-original-title="Delete" class="btn btn-danger mx-1 btn-sm deleteData">Delete</a>
              <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-success btn-sm tambahParam">Tambah Parameter</a>
              <tr>
                <th>No</th>
                <th>Setting</th>
                <th>Parameter</th>
                <th>Ampere</th>
                <th width="160px">Action</th>
              </tr>
            </thead>
            <tbody>                
            </tbody>
          </table>
          @endforeach
        </div>
          @include('content.apps.user.modal-create-machine')
          @include('content.apps.user.modal-create-param')
          @include('content.apps.user.modal-edit-param')
      </div>
    </div>
  </div>
</section>
@endsection

@section('vendor-script')
  {{-- Vendor js files --}}
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
  {{-- data table --}}
  <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
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
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/modal-edit-user.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
  <script>
    $(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    var table = $('.datatable-project').DataTable({
      processing : true,
      serverSide : true,
      dataType: 'json',
      ajax: {
              url: id,
              type: "GET"
      },
      columns : [
        {data: 'DT_RowIndex', name:'DT_RowIndex'},
        {data: 'name', name:'name'},
        {data: 'parameter', name:'parameter'},
        {data: 'ampere', name:'ampere'},
        {data: 'action', name:'action', searchable:false, orderable: false}
      ]
    });

    $('#update').click(function(e){
        e.preventDefault();
        let id = $('#id').val();
        let trial_machine_id = $('#trial_machine_id_edit').val();
        let name = $('#name_edit').val();
        let parameter = $('#parameter_edit').val();
        let ampere = $('#ampere_edit').val();
        $.ajax({
            url : 'update/'+id,
            type: 'PUT',
            cache: false,
            data: {
                "trial_machine_id" : trial_machine_id,
                "name": name,
                "parameter": parameter,
                "ampere": ampere
            },
            success:function(response){
                Swal.fire({
                    icon: 'success',
                    title: `${response.message}`,
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

    $('#store').click(function(e){
      e.preventDefault();
      let machine_number = $('#machine_number').val();
      let process_id = $('#process_id').val();
      let trial_id = $('#trial_id').val();
      $.ajax({
        url : `{{ route('machine.store', $data->id) }}`,
        type: "POST",
        dataType: 'json',
        data: {
          "machine_number" : machine_number,
          "process_id" : process_id,
          "trial_id" : trial_id,
        },
        success:function(response){
        location.reload();
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

    $('#storeparam').click(function(e){
      e.preventDefault();
      let trial_machine_id = $('#trial_machine_id').val();
      let name = $('#name').val();
      let parameter = $('#parameter').val();
      let ampere = $('#ampere').val();
      $.ajax({
        url : `{{ route('param.stores', $data->id) }}`,
        type: "POST",
        dataType: 'json',
        data: {
          "trial_machine_id" : trial_machine_id,
          "name" : name,
          "parameter" : parameter,
          "ampere" : ampere,
        },
        success:function(response){
        Swal.fire({
          icon: 'success',
          title : "Data berhasil Ditambahkan",
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

    $('body').on('click', '.deleteData', function () {
     let id1 = $(this).data('id');
     var result= confirm("Apakah yakin menghapus data?");
     
     if(result){
     $.ajax({
         type: "DELETE",
         url:  "{{ route('machine.destroy') }}"+'/'+id1,
         cache: false,
         success: function (data) {
          location.reload(3000);
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