@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="mb-3">
          <h3 class="">Detail {{ $title }}</h3>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>TX ID : </strong><br>{{ $data->txid }}</li>
            <li class="list-group-item"><strong>Customer Name : </strong><br>{{ $data->user_customer->name }}</li>
            <li class="list-group-item"><strong>Owner Name : </strong><br>{{ $data->user_owner->name }}</li>
            <li class="list-group-item"><strong>Warehouse Name : </strong><br>{{ $data->detail_warehouse->warehouse->name }}</li>
            <li class="list-group-item"><strong>Information : </strong><br>{{ $data->information }}</li>
            <li class="list-group-item"><strong>Total : </strong><br>{{ $data->total }}</li>
            <li class="list-group-item"><strong>Status : </strong><br>{{ $data->status }}</li>
        </ul>
        <a class="btn btn-success mt-3" href="{{ url('admin/transaction/') }}">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush