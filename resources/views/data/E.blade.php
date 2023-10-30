@extends('layouts.app')
@section('content')
<!-- Default box -->
<div class="card card-outline card-{{ DB::table('pengaturan')->first()->k25 }}">
  <div class="card-header">
    <h3 class="card-title text-capitalize font-weight-bold">Kinerja Dosen</h3><br>
    <p class="m-0">Karya Ilmiah DTPS</p>
  </div>
  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="bg-lightblue">
                <tr>
                    <th class="va-middle text-center">No</th>
                    <th class="va-middle text-center">Nama Dosen</th>
                    <th class="va-middle text-center">Judul Artikel yang Disitasi (Jurnal, Volume, Tahun, Nomor, Halaman)</th>
                    <th class="va-middle text-center">Jumlah Sitasi</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($collection as $k => $v)      
              <tr>
                <td class="text-center">{{ $k + 1 }}</td>
                <td class="text-center">{{ $v->dosen_peneliti }}</td>
                <td class="text-center">{{ $v->judul_artikel }}</td>
                <td class="text-center">{{ $v->jumlah_sitasi }}</td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>
<!-- /.card -->
@endsection