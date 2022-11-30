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
            <li class="list-group-item"><strong>User ID : </strong><br>{{ $data->user_id }}</li>
            <li class="list-group-item"><strong>Nama : </strong><br>{{ $data->name }}</li>
            <li class="list-group-item"><strong>Phone : </strong><br>{{ $data->phone }}</li>
            <li class="list-group-item"><strong>Gender : </strong><br>{{ $data->gender }}</li>
            <li class="list-group-item"><strong>Alamat : </strong><br>{{ $data->alamat }}</li>
            <li class="list-group-item"><strong>Foto : </strong><br><img style="width: 150px" src="{{ asset('./storage/'. $data->identity_photo) }}" alt=""></li>
        </ul>
        <a class="btn btn-success mt-3" href="{{ url('admin/owner/') }}">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush