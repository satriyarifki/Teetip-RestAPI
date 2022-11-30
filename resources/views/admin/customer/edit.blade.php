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
        <form method="POST" action="{{ url('admin/customer-update/'.$data->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <label for="email">Email</label>
              <input class="form-control"  id="email" placeholder="Masukkan Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  readonly value="{{ $data->user->email }}" required autocomplete="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group  col-md-6">
              <label for="name"> Name</label>
              <input class="form-control" id="name" placeholder="Masukkan Nama Lengkap" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}"  >
    
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
    
          <div class="row">
            <div class="form-group col-md-6">
              <label for="phone"> Phone</label>
              <input id="phone" placeholder="Masukkan Nomor HP" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $data->phone }}">
              @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="gender"> Gender</label>
              <select name="gender" id="gender" class="form-control">
                <option value="male" {{ ($data->gender == 'male') ? 'selected' : '' }} >Laki-laki</option>
                <option value="female" {{ ($data->gender == 'female') ? 'selected' : '' }}>Perempuan</option>
                <option value="hidden" {{ ($data->gender == 'hidden') ? 'selected' : '' }}>Hidden</option>
              </select>
              @error('gender')
                <div class="invalid-feedback ml-1">{{ $message }}</div>
              @enderror
            </div>
          </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input id="alamat" placeholder="Masukkan Alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $data->alamat }}">

          @error('alamat')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        
        <div class="form-group">
          <label for="identity_photo">Photo</label>
          <input clas type="file" name="identity_photo" id="identity_photo" class="form-control rad-6 fs-normal @error('identity_photo') is-invalid @enderror" placeholder="Zip Code" value="{{ $data->user->identity_photo }}">
          @if ($data->identity_photo == NULL)
            <span class="text-danger fs-small">You haven't uploaded Photo *</span>
          @endif
          @error('identity_photo')
            <div class="invalid-feedback ml-1">{{ $message }}</div>
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