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
        <form method="POST" action="{{ url('admin/detail-warehouse-update/'.$data->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <label for="warehouse_id"> Warehouse ID</label>
              <input class="form-control"  id="warehouse_id" type="text" class="form-control @error('warehouse_id') is-invalid @enderror" name="warehouse_id"  readonly value="{{ $data->warehouse_id }}" required autocomplete="warehouse_id">
              @error('warehouse_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group  col-md-6">
              <label for="panjang_petak"> Panjang Petak</label>
              <input class="form-control" id="panjang_petak" placeholder="Masukkan Panjang Petak" type="text" class="form-control @error('panjang_petak') is-invalid @enderror" name="panjang_petak" value="{{ $data->panjang_petak }}"  >
    
              @error('panjang_petak')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
    
          <div class="row">
            <div class="form-group  col-md-6">
              <label for="lebar_petak"> Lebar Petak</label>
              <input class="form-control" id="lebar_petak" placeholder="Masukkan Lebar Petak" type="text" class="form-control @error('lebar_petak') is-invalid @enderror" name="lebar_petak" value="{{ $data->lebar_petak }}"  >
    
              @error('lebar_petak')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group  col-md-6">
              <label for="luas_petak"> Luas Petak</label>
              <input class="form-control" id="luas_petak" placeholder="Masukkan Luas Petak" type="text" class="form-control @error('luas_petak') is-invalid @enderror" name="luas_petak" value="{{ $data->luas_petak }}"  >
    
              @error('luas_petak')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
        <div class="form-group">
          <label for="harga"> Harga</label>
          <input id="harga" placeholder="Masukkan Harga" type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ $data->harga }}">

          @error('harga')
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