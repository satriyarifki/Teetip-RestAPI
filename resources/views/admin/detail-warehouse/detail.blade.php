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
            <li class="list-group-item"><strong>Warehouse Name : </strong><br>{{ $data->warehouse->name }}</li>
            <li class="list-group-item"><strong>Panjang Petak : </strong><br>{{ $data->panjang_petak }} m</li>
            <li class="list-group-item"><strong>Lebar Petak : </strong><br>{{ $data->lebar_petak }} m</li>
            <li class="list-group-item"><strong>Luas Petak : </strong><br>{{ $data->luas_petak }} m2</li>
            <li class="list-group-item"><strong>Harga : </strong><br>{{ $data->harga }}</li>
        </ul>
        <a class="btn btn-success mt-3" href="{{ url('admin/detail-warehouse/') }}">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush