@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="mb-3">
          <h3 class="">Edit {{ $title }}</h3>
        </div>
        <form method="POST" action="{{ url('admin/user-update/'.$data->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <label for="email"> Email</label>
              <input class="form-control"  id="email" placeholder="Masukkan Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  readonly value="{{ $data->email }}" required autocomplete="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="role"> Role</label>
              <select name="role_id" id="role_id"  class="form-control rad-10 @error('role_id') is-invalid @enderror">
                <option value="1" selected>Super Admin</option>
                <option value="2" selected>Admin</option>
                <option value="3" selected>Customer (Pemilik Barang)</option>
                <option value="4">Owner (Pemilik Gudang)</option>
              </select>
              @error('role_id')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        <div class="form-group">
          <button class="btn btn-primary submit-btn btn-block">Update</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush