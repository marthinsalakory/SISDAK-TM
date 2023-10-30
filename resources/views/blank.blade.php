@extends('layouts.app')
@section('content')
<!-- Default box -->
<div class="card card-outline card-{{ DB::table('pengaturan')->first()->k25 }}">
  <div class="card-header">
    <h3 class="card-title text-capitalize">{{ strtr( Request::route()->getName(), ".", " " ) }}</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    Welcome to your app
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    {{ strtr( Request::route()->getName(), ".", " " ) }}
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection