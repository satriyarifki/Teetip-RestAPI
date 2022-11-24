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
        <form method="POST" action="{{ url('admin/transaction-update/'.$data->txid) }}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <label for="txid"> TX ID</label>
              <input class="form-control"  id="txid" type="text" class="form-control @error('txid') is-invalid @enderror" name="txid"  readonly value="{{ $data->txid }}" required autocomplete="txid">
              @error('txid')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="user_customer_id"> Customer Name</label>
              <input class="form-control"  id="user_customer_id" type="text" class="form-control @error('user_customer_id') is-invalid @enderror" name="user_customer_id"  readonly value="{{ $data->user_customer->name }}" required autocomplete="user_customer_id">
              @error('user_customer_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <label for="user_owner_id"> Owner Name</label>
              <input class="form-control"  id="user_owner_id" type="text" class="form-control @error('user_owner_id') is-invalid @enderror" name="user_owner_id"  readonly value="{{ $data->user_owner->name }}" required autocomplete="user_owner_id">
              @error('user_owner_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="detail_warehouse_id"> Warehouse Name</label>
              <input class="form-control"  id="detail_warehouse_id" type="text" class="form-control @error('detail_warehouse_id') is-invalid @enderror" name="detail_warehouse_id"  readonly value="{{ $data->detail_warehouse->warehouse->name }}" required autocomplete="detail_warehouse_id">
              @error('detail_warehouse_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <label for="information"> Information</label>
              <input id="information" placeholder="Masukkan Informasi" type="text" class="form-control @error('information') is-invalid @enderror" name="information" value="{{ $data->information }}">
              @error('information')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="status"> Status</label>
              <select name="status" id="status" class="form-control rad-6 fs-normal">
                <option value="unpaid" {{ ($data->gender == 'unpaid') ? 'selected' : '' }}>Unpaid</option>
                <option value="processing" {{ ($data->gender == 'processing') ? 'selected' : '' }}>Processing</option>
                <option value="done" {{ ($data->gender == 'done') ? 'selected' : '' }}>Done</option>
              </select>
              @error('status')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
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