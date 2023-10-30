@extends('layouts.app')

@section('content')
<div class="row">
  @include('input.menu')
  <div class="col-md-9">
    <div class="card card-outline card-lightblue">
      <div class="card-header">
        <h3 class="card-title text-capitalize font-weight-bold">Kinerja Dosen</h3><br>
        <p>C. Pengabdian Kepada Masyarakat DTPS</p>
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
        @foreach ($inputC as $k => $v)
        <form method="POST" action="{{ route('input.C', $user->id) }}" enctype="multipart/form-data">@csrf
          <input type="hidden" name="id" value="{{ $v->id }}">
          <div class="form-group">
            <label for="sumber_pembiayaan{{ $k }}">Sumber Pembiayaan</label>
            <select name="sumber_pembiayaan" id="sumber_pembiayaan{{ $k }}" class="form-control">
              <option value="">Pilih</option>
              @if (old('sumber_pembiayaan'))
              <option @selected(old('sumber_pembiayaan') == 'Perguruan Tinggi Mandiri') value="Perguruan Tinggi Mandiri">Perguruan Tinggi/Mandiri</option>
              <option @selected(old('sumber_pembiayaan') == 'Lembaga Dalam Negeri (diluar PT)') value="Lembaga Dalam Negeri (diluar PT)">Lembaga Dalam Negeri (diluar PT)</option>
              <option @selected(old('sumber_pembiayaan') == 'Lembaga Luar Negeri') value="Lembaga Luar Negeri">Lembaga Luar Negeri</option>
              @else
              <option @selected($v->sumber_pembiayaan == 'Perguruan Tinggi Mandiri') value="Perguruan Tinggi Mandiri">Perguruan Tinggi/Mandiri</option>
              <option @selected($v->sumber_pembiayaan == 'Lembaga Dalam Negeri (diluar PT)') value="Lembaga Dalam Negeri (diluar PT)">Lembaga Dalam Negeri (diluar PT)</option>
              <option @selected($v->sumber_pembiayaan == 'Lembaga Luar Negeri') value="Lembaga Luar Negeri">Lembaga Luar Negeri</option>
              @endif
            </select>
          </div>
          <div class="form-group">
            <label for="judul_penelitian{{ $k }}">Judul Penelitian</label>
            <input class="form-control" type="text" name="judul_penelitian" id="judul_penelitian{{ $k }}" placeholder="Masukan Judul Penelitian" value="@if(old('judul_penelitian')) {{ old('judul_penelitian') }} @else {{ $v->judul_penelitian }} @endif">
          </div>
          <div class="form-group">
            <label for="file{{ $k }}">Unggah File</label>
            <input accept=".pdf" required class="form-control" type="file" name="file" id="file{{ $k }}" placeholder="Masukan File Penelitian" value="@if(old('file')) {{ old('file') }} @else {{ $v->file }} @endif">            
            <span class="text-danger font-weight-bold">* File Laporan Penelitian format pdf</span>
          </div>
          <div class="form-group">
            <label for="tahun{{ $k }}">Tahun</label>
            <select name="tahun" class="form-control" id="tahun{{ $k }}">
              <option value="">Pilih</option>
              <option @selected($v->tahun == 'TS') value="TS">TS</option>
              <option @selected($v->tahun == 'TS-1') value="TS-1">TS-1</option>
              <option @selected($v->tahun == 'TS-2') value="TS-2">TS-2</option>
            </select>
          </div>
          <div class="text-right">
            @if ($k != 0)
            <a href="{{ route('input.C.delete', [$id, $v->id]) }}" class="btn btn-danger btn-flat btn-xs mb-3"><i class="fa fa-trash"></i> Hapus</a>
            @endif
            <a href="{{ route('input.C.add', $id) }}" class="btn btn-primary btn-flat btn-xs mb-3"><i class="fa fa-add"></i> Tambah</a>
            <button class="btn btn-primary btn-flat btn-xs mb-3 swalDefaultSuccess"><i class="fa fa-save"></i> Simpan</button>
          </div>
        </form>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection