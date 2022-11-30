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
                <th>Warehouse Name</th>
                <th>Panjang Petak</th>
                <th>Lebar Petak</th>
                <th>Luas Petak</th>
                <th>Harga</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tables as $row)
              <tr>
                <td>{{ $row->warehouse->name }}</td>
                <td>{{ $row->panjang_petak }} m</td>
                <td>{{ $row->lebar_petak }} m</td>
                <td>{{ $row->luas_petak }} m2</td>
                <td>{{ $row->harga }}</td>
                <td>
                  <form action="/admin/detail-warehouse/{{ $row->id }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data?')" method="post">
                    @csrf
                    @method('DELETE')
  
                    <a href="/admin/detail-warehouse-edit/{{ $row->id }}" data-id="detailWarehouseEdit{{ $row->id }}" class="btn fs-small btn-primary text-decoration-none">
                      <span class="fa fa-fw fa-syringe mx-1"></span>
                      Edit
                    </a>
                    <a href="/admin/detail-warehouse-detail/{{ $row->id }}" data-id="detailWarehouseDetail{{ $row->id }}" class="btn fs-small btn-info text-decoration-none">
                      <span class="fa fa-fw fa-syringe mx-1"></span>
                      Show
                    </a>
  
                    <button type="submit" data-id="detailWarehouseDelete{{ $row->id }}" class="btn fs-small btn-danger">
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