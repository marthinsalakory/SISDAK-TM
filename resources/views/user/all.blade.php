@extends('layouts.app')
@section('content')
<!-- Default box -->
<div class="row">
  <div class="col">
    <div class="card card-outline card-lightblue">
      <div class="card-body p-0">
        <div class="list-group">
          <a href="{{ route('user') }}" class="list-group-item @empty($role_id) active @endempty">Semua</a>
        </div>
      </div>
    </div>
    <div class="card card-outline card-lightblue">
      <div class="card-header">
        <h3 class="card-title">Role</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="list-group">
          <a class="list-group-item @if($role_id == 2) active @endif" href="{{ route('user', 2) }}">Dosen</a>
          <a class="list-group-item @if($role_id == 3) active @endif" href="{{ route('user', 3) }}">Asesor</a>
          <a class="list-group-item @if($role_id == 1) active @endif" href="{{ route('user', 1) }}">Admin</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="card card-outline card-lightblue">
      <div class="card-header">
        <h3 class="card-title text-capitalize">{{ strtr( Request::route()->getName(), ".", " " ) }}</h3>

        <div class="card-tools">
          <a href="{{ route('user') }}" type="button" class="btn btn-tool" title="Refresh">
            <i class="fas fa-refresh"></i>
          </a>

          @if($role_id)
          <a href="{{ route('user.add', $role_id) }}" type="button" class="btn btn-tool" title="Add User">
            <i class="fas fa-user-plus"></i>
          </a>
          @endif

          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-sm" id="table-search">
            <thead class="table-secondary">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>@if($role_id == 2) NIDN @else Username @endif</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $i => $u)              
              <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $u->nama }}</td>
                <td>{{ $u->username }}</td>
                <td class="text-center">
                  @if ($u->role_id == 2)
                  <a href="{{ route('input.A', $u->id) }}" class="btn btn-info btn-xs btn-flat" title="Detail"><i class="fa fa-pen"></i></a>
                  @endif
                  <a href="{{ route('user.profile', $u->id) }}" class="btn btn-primary btn-xs btn-flat" title="Detail"><i class="fa fa-user"></i></a>
                  <a onclick="return confirm('Reset password?')" href="{{ route('user.password.reset', $u->id) }}" class="btn btn-success btn-xs btn-flat" title="Reset Password"><i class="fa fa-key"></i></a>
                  <a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning btn-xs btn-flat" title="Edit"><i class="fa fa-edit"></i></a>
                  <a onclick="return confirm('Delete?')" href="{{ route('user.delete', $u->id) }}" class="btn btn-danger btn-xs btn-flat" title="Delete"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>  
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        {{ strtr( Request::route()->getName(), ".", " " ) }}
      </div>
      <!-- /.card-footer-->
    </div>
  </div>
</div>
<!-- /.card -->
@endsection