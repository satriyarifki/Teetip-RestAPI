@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Table {{ $title }}</h4>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>User ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Luas Total</th>
                <th>Harga/m2</th>
                <th>Tipe</th>
                <th>Deskripsi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tables as $row)
              <tr>
                <td>{{ $row->user_owner_id }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->luas_total }}</td>
                <td>{{ $row->harga_m2 }}</td>
                <td>{{ $row->tipe }}</td>
                <td>{{ $row->deskripsi }}</td>
                <td>
                  <form action="/admin/warehouse/{{ $row->id }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data?')" method="post">
                    @csrf
                    @method('DELETE')
  
                    <a href="/admin/warehouse-edit/{{ $row->id }}" data-id="warehouseEdit{{ $row->id }}" class="btn fs-small btn-info text-decoration-none">
                      <span class="fa fa-fw fa-syringe mx-1"></span>
                      Edit
                    </a>
  
                    <button type="submit" data-id="warehouseDelete{{ $row->id }}" class="btn fs-small btn-danger">
                      <span class="fa fa-fw fa-trash mx-1"></span>
                    Hapus
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
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