@extends('login.login')

@section('name')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">My Post</h1>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">1</th>
              <th scope="col">2</th>
              <th scope="col">3</th>
              <th scope="col">4</th>
              <th scope="col">5</th>
              <th scope="col">6</th>
              <th scope="col">7</th>
              <th scope="col">8</th>
              <th scope="col">9</th>
              <th scope="col">10</th>
              <th scope="col">11</th>
              <th scope="col">12</th>
              <th scope="col">13</th>
              <th scope="col">14</th>
              <th scope="col">15</th>
              <th scope="col">16</th>
              <th scope="col">17/th>
              <th scope="col">18</th>
              <th scope="col">19</th>
              <th scope="col">20/th>
              <th scope="col">21</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $dat)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $dat->document_number }}</td>
              <td>{{ $dat->document_date}}</td>
              <td>{{ $dat->trial_type}}</td>
              <td>{{ $dat->trial_note}}</td>
              <td>{{ $dat->item_code}}</td>
              <td>{{ $dat->family_product}}</td>
              <td>{{ $dat->item_name}}</td>
              <td>{{ $dat->size}}</td>
              <td>{{ $dat->note}}</td>
              <td>{{ $dat->approval_created_by}}</td>
              <td>{{ $dat->approval_created_date}}</td>
              <td>{{ $dat->approval_plant_head_name}}</td>
              <td>{{ $dat->approval_ppic_name}}</td>
              <td>{{ $dat->approval_ppic_date}}</td>
              <td>{{ $dat->approval_gm_name}}</td>
              <td>{{ $dat->approval_gm_date}}</td>
              <td>{{ $dat->costing_approved}}</td>
              <td>{{ $dat->costing_staff_name}}</td>
              <td>{{ $dat->costing_approval_name}}</td>
              <td>{{ $dat->costing_approval_date}}</td>
              </form>
              </td>
            </tr>                
          @endforeach
          </tbody>
        </table>
      </div>
  </main>
    
@endsection