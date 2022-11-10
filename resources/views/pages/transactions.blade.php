@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Table Transactions</h4>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>TXID</th>
                <th>Customer</th>
                <th>Owner</th>
                <th>Detail WH ID</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>008923</td>
                <td>Burhan</td>
                <td>Aldi</td>
                <td>0827675839xx</td>
                <td>1</td>
                <td>
                  <label class="badge badge-danger">Pending</label>
                </td>
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