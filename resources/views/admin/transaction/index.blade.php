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
                <th>TX ID</th>
                <th>Customer ID</th>
                <th>Owner ID</th>
                <th>Detail Warehouse ID</th>
                <th>information</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tables as $row)
              <tr>
                <td>{{ $row->txid }}</td>
                <td>{{ $row->user_customer_id }}</td>
                <td>{{ $row->user_owner_id }}</td>
                <td>{{ $row->detail_warehouse_id }}</td>
                <td>{{ $row->information }}</td>
                <td>{{ $row->total }}</td>
                <td>{{ $row->status }}</td>
                <td>
                  <form action="/admin/transaction/{{ $row->txid }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data?')" method="post">
                    @csrf
                    @method('DELETE')
  
                    <a href="/admin/transaction-edit/{{ $row->txid }}" data-id="transactionEdit{{ $row->txid }}" class="btn fs-small btn-info text-decoration-none">
                      <span class="fa fa-fw fa-syringe mx-1"></span>
                      Edit
                    </a>
  
                    <button type="submit" data-id="transactionDelete{{ $row->txid }}" class="btn fs-small btn-danger">
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