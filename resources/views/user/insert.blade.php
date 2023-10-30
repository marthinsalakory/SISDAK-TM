@extends('layouts.app')
@section('content')
<!-- Default box -->
<div class="card card-default">
  <div class="card-header">
    <h3 class="card-title text-capitalize">User Add</h3>

    <div class="card-tools">
      <a href="{{ url()->previous() }}" class="btn btn-tool" title="Kembali">
        <i class="fas fa-backward"></i>
      </a>
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <form method="POST" action="{{ route('user.add', $role_id) }}" class="card-body">@csrf
    <div class="row justify-content-end mb-3">
      <div class="col-12 mb-3">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
        @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 mb-3">
        <label for="username">{{ $role_id == 2 ? 'NIDN' : 'Username' }}</label>
        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 mb-3">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 mb-3">
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
      </div>
      <div class="col-12 text-right">
        <button type="reset" class="btn btn-danger btn-flat btn-sm" title="Reset"><i class="fa fa-refresh"></i> Reset</button>
        <button class="btn btn-primary btn-flat btn-sm" title="Submit"><i class="fa fa-save"></i> Submit</button>
      </div>
    </div>
    
  </form>
  <!-- /.card-body -->
  <div class="card-footer">
    {{ strtr( Request::route()->getName(), ".", " " ) }}
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection