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
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tables as $row)
              <tr>
                <td>{{ $row->email }}</td>
                <td>{{ $row->role->role_name }}</td>
                <td>
                  <form action="/admin/user/{{ $row->id }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data?')" method="post">
                    @csrf
                    @method('DELETE')
  
                    <a href="/admin/user-edit/{{ $row->id }}" data-id="userEdit{{ $row->id }}" class="btn fs-small btn-primary text-decoration-none">
                      <span class="fa fa-fw fa-syringe mx-1"></span>
                      Edit
                    </a>
                    <!-- <a href="/admin/user-detail/{{ $row->id }}" data-id="userDetail{{ $row->id }}" class="btn fs-small btn-info text-decoration-none">
                      <span class="fa fa-fw fa-syringe mx-1"></span>
                      Show
                    </a> -->
  
                    <button type="submit" data-id="ownerDelete{{ $row->id }}" class="btn fs-small btn-danger">
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