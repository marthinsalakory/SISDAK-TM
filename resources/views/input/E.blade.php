@extends('layouts.app')

@section('content')
<div class="row">
  @include('input.menu')
  <div class="col-md-9">
    <div class="card card-outline card-lightblue">
      <div class="card-header">
        <h3 class="card-title text-capitalize font-weight-bold">Kinerja Dosen</h3><br>
        <p>E. Karya Ilmiah DTPS</p>
      </div>
      <div class="card-body">
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        @foreach ($inputE as $k => $v)
        <form method="POST" action="{{ route('input.E', $user->id) }}" enctype="multipart/form-data">@csrf
          <input type="hidden" name="id" value="{{ $v->id }}">
          <div class="form-group">
            <label for="dosen_peneliti{{ $k }}">Dosen Peneliti</label>
            <input required type="text" name="dosen_peneliti" id="dosen_peneliti{{ $k }}" class="form-control" value="{{ $v->dosen_peneliti }}">
          </div>
          <div class="form-group">
            <label for="judul_artikel{{ $k }}">Judul Artikel yang Disitasi</label>
            <input required class="form-control" type="text" name="judul_artikel" id="judul_artikel{{ $k }}" placeholder="Masukan Judul Penelitian" value="@if(old('judul_artikel')) {{ old('judul_artikel') }} @else {{ $v->judul_artikel }} @endif">
          </div>
          <div class="form-group">
            <label for="file{{ $k }}">Unggah File</label>
            <input required accept=".pdf" class="form-control" type="file" name="file" id="file{{ $k }}" placeholder="Masukan File Penelitian" value="@if(old('file')) {{ old('file') }} @else {{ $v->file }} @endif">            
            <span class="text-danger font-weight-bold">* File Laporan Penelitian format pdf</span>
          </div>
          <div class="form-group">
            <label for="link_artikel{{ $k }}">Link Artikel yang Disitasi</label>
            <input required type="text" class="form-control" name="link_artikel" id="link_artikel{{ $k }}" value="{{ old('link_artikel') ? old('link_artikel') : $v->link_artikel }}">
          </div>
          <div class="form-group">
            <label for="jumlah_sitasi{{ $k }}">Jumlah Sitasi</label>
            <input required type="number" class="form-control" name="jumlah_sitasi" id="jumlah_sitasi{{ $k }}" value="{{ old('jumlah_sitasi') ? old('jumlah_sitasi') : $v->jumlah_sitasi }}">
          </div>
          <div class="text-right">
            @if ($k != 0)
            <a href="{{ route('input.E.delete', [$id, $v->id]) }}" class="btn btn-danger btn-flat btn-xs mb-3"><i class="fa fa-trash"></i> Hapus</a>
            @endif
            <a href="{{ route('input.E.add', $id) }}" class="btn btn-primary btn-flat btn-xs mb-3"><i class="fa fa-add"></i> Tambah</a>
            <button class="btn btn-primary btn-flat btn-xs mb-3 swalDefaultSuccess"><i class="fa fa-save"></i> Simpan</button>
          </div>
        </form>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection