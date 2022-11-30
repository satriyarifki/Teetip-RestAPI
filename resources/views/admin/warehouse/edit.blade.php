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
        <form method="POST" action="{{ url('admin/warehouse-update/'.$data->id) }}">
          @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <label for="user_owner_id"> Owner ID</label>
              <input class="form-control"  id="user_owner_id" type="text" class="form-control @error('user_owner_id') is-invalid @enderror" name="user_owner_id"  readonly value="{{ $data->user_owner_id }}" required autocomplete="user_owner_id">
              @error('user_owner_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group  col-md-6">
              <label for="name"> Name</label>
              <input class="form-control" id="name" placeholder="Masukkan Nama Rumah" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}"  >
    
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
    
          <div class="row">
            <div class="form-group col-md-6">
              <label for="alamat"> Alamat</label>
              <input id="alamat" placeholder="Masukkan Alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $data->alamat }}">
              @error('alamat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="tipe"> Tipe</label>
              <input id="tipe" placeholder="Masukkan Tipe" type="text" class="form-control @error('tipe') is-invalid @enderror" name="tipe" value="{{ $data->tipe }}">
              @error('tipe')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <label for="luas_total"> Luas Total</label>
              <input id="luas_total" placeholder="Masukkan Luas Total" type="text" class="form-control @error('luas_total') is-invalid @enderror" name="luas_total" value="{{ $data->luas_total }}">
              @error('luas_total')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="harga_m2"> Harga/m2</label>
              <input id="harga_m2" placeholder="Masukkan Harga/m2" type="text" class="form-control @error('harga_m2') is-invalid @enderror" name="harga_m2" value="{{ $data->harga_m2 }}">
              @error('harga_m2')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

        <div class="form-group">
          <label for="deskripsi"> Deskripsi</label>
          <input id="deskripsi" placeholder="Masukkan Deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ $data->deskripsi }}">

          @error('alamat')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
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