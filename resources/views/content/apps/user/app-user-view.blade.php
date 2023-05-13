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
      <div class="col mb-2 md-4"><a href="javascript:void(0)" class="btn btn-success" id="new-material">Tambah Material</a></div>
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
            {{-- <div class="d-flex justify-content-center pt-2">
              <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser" data-bs-toggle="modal">
                Edit
              </a>
              <a href="javascript:;" class="btn btn-outline-danger suspend-user">Suspended</a>
            </div> --}}
              {{-- @break
             @endforeach --}}
          </div>
        </div>
      </div>
      <!-- /User Card -->
      <!-- Plan Card -->
      {{-- <div class="card border-primary">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start">
            <span class="badge bg-light-primary">Standard</span>
            <div class="d-flex justify-content-center">
              <sup class="h5 pricing-currency text-primary mt-1 mb-0">$</sup>
              <span class="fw-bolder display-5 mb-0 text-primary">99</span>
              <sub class="pricing-duration font-small-4 ms-25 mt-auto mb-2">/month</sub>
            </div>
          </div>
          <ul class="ps-1 mb-2">
            <li class="mb-50">10 Users</li>
            <li class="mb-50">Up to 10 GB storage</li>
            <li>Basic Support</li>
          </ul>
          <div class="d-flex justify-content-between align-items-center fw-bolder mb-50">
            <span>Days</span>
            <span>4 of 30 Days</span>
          </div>
          <div class="progress mb-50" style="height: 8px">
            <div
              class="progress-bar"
              role="progressbar"
              style="width: 80%"
              aria-valuenow="65"
              aria-valuemax="100"
              aria-valuemin="80"
            ></div>
          </div>
          <span>4 days remaining</span>
          <div class="d-grid w-100 mt-2">
            <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">
              Upgrade Plan
            </button>
          </div>
        </div>
      </div> --}}
      <!-- /Plan Card -->
    </div>
    <!--/ User Sidebar -->

    <!-- User Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
      <!-- User Pills -->
      <ul class="nav nav-pills mb-2">
        <li class="nav-item">
          <a class="nav-link active" href="{{ $data->id }}">
            <i data-feather="user" class="font-medium-1 me-50"></i>
            <span class="fw-bold">Trial Material</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{asset('app/user/view/security')}}">
            <i data-feather="lock" class="font-medium-1 me-50"></i>
            <span class="fw-bold">Trial Approval</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{asset('app/user/view/billing')}}">
            <i data-feather="bookmark" class="font-medium-1 me-50"></i>
            <span class="fw-bold">Composition</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{asset('app/user/view/notifications')}}">
            <i data-feather="bell" class="font-medium-1 me-50"></i><span class="fw-bold">Trial Machine</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{asset('app/user/view/connections')}}">
            <i data-feather="link" class="font-medium-1 me-50"></i><span class="fw-bold">Acceptance</span>
          </a>
        </li>
      </ul>
      <!--/ User Pills -->

      <!-- Project table -->
      <div class="card">
        <h4 class="card-header">Trial Material</h4>
        <div class="table-responsive">
          <table class="table datatable-project">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Item</th>
                <th>Item</th>
                <th>QTY (zack)</th>
                <th>QTY (Kg)</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

        {{-- Modal --}}
          <div class="modal modal-slide-in fade" id="tambah-material" aria-hidden="true">
            <div class="modal-dialog sidebar-lg">
              <div class="modal-content p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                  <h5 class="modal-title">
                    <span class="align-middle">Tambah Material</span>
                  </h5>
                </div>
                <div class="modal-body flex-grow-1">
                  <form id="material-form">
                    @csrf
                    <div class="mb-1">
                      <label class="form-label">Kode Item</label>
                      <input type="text" id="trial_id" name="trial_id" class="form-control" value="{{ $data->id }}">
                    </div>                    
                    <div class="mb-1">
                      <label class="form-label">Kode Item</label>
                      <input type="text" id="item_code" name="item_code" class="form-control">
                    </div>
                    <div class="mb-1">
                      <label class="form-label">Nama Item</label>
                      <input id="item_name" name="item_name" class="form-control" type="text" />
                    </div>
                    <div class="mb-1">
                      <label class="form-label">Quantity (Zack)</label>
                      <input class="form-control" id="qty_zack" name="qty_zack" rows="5" type="number">
                    </div>
                    <div class="mb-1">
                      <label class="form-label">Quantity (Kg)</label>
                      <input class="form-control" id="qty_kg" name="qty_kg" rows="5" type="number">
                    </div>
                    <div class="d-flex flex-wrap mb-0">
                      <button type="submit" class="btn btn-primary me-1" data-bs-dismiss="modal" id="store">Send</button>
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>

@include('content/_partials/_modals/modal-edit-user')
@include('content/_partials/_modals/modal-upgrade-plan')
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
  {{-- <script src="{{ asset(mix('js/scripts/pages/app-user-view-account.js')) }}"></script> --}}
  <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
  <script>
    $(function(){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.dataTable-project').DataTable({
      processing : true,
      serverSide : true,
      ajax: "{{ route('material.index') }}",
      columns : [
        {material: 'DT_RowIndex', name:'DT_RowIndex'},
        {material: 'item_code', name:'item_code'},
        {material: 'item_name', name:'item_name'},
        {material: 'qty_zack', name: 'qty_zack'},
        {material: 'qty_kg', name: 'qty_kg'},
      ]
    });
    $('#new-material').click(function () {
      $('#tambah-material').modal('show');
      // $('#store').val("create-data");
       $('#material-form').trigger("reset");
    });
    $('#store').click(function(e){
      e.preventDefault();
      let item_code = $('#item_code').val();
      let item_name = $('#item_name').val();
      let qty_zack = $('#qty_zack').val();
      let qty_kg = $('#qty_kg').val();
      let trial_id = $('#trial_id').val();

      $.ajax({
        url : "{{ route('material.store') }}",
        type: "POST",
        dataType: 'json',
        data: {
          "item_code" : item_code,
          "item_name" : item_name,
          "qty_zack" : qty_zack,
          "qty_kg" : qty_kg,
          "trial_id" : trial_id
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
  });
    </script>
@endsection