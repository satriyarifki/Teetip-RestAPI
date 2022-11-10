@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Table Warehouses</h4>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Owner</th>
                <th>Alamat</th>
                <th>Luas Total</th>
                <th>Harga m2</th>
                <th>Tipe</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Aldi</td>
                <td>Jl. Jaksa Agung No.11</td>
                <td>24 m2</td>
                <td>1000</td>
                <td>Rumah</td>
              </tr>
              {{-- <tr>
                <td>2</td>
                <td>Aldi</td>
                <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i>
                </td>
                <td>
                  <label class="badge badge-danger">Pending</label>
                </td>
              </tr> --}}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush