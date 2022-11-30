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
            <li class="list-group-item"><strong>Owner Name : </strong><br>{{ $data->user_owner->name }}</li>
            <li class="list-group-item"><strong>Warehouse Name : </strong><br>{{ $data->name }}</li>
            <li class="list-group-item"><strong>Alamat : </strong><br>{{ $data->alamat }}</li>
            <li class="list-group-item"><strong>Luas Total : </strong><br>{{ $data->luas_total }}</li>
            <li class="list-group-item"><strong>Harga/m2 : </strong><br>{{ $data->harga_m2 }}</li>
            <li class="list-group-item"><strong>Tipe : </strong><br>{{ $data->tipe }}</li>
            <li class="list-group-item"><strong>Deskripsi : </strong><br>{{ $data->deskripsi }}</li>
        </ul>
        <a class="btn btn-success mt-3" href="{{ url('admin/warehouse/') }}">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush