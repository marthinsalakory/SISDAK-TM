@extends('layouts.app')
@section('content')
<!-- Default box -->
<div class="card card-outline card-{{ DB::table('pengaturan')->first()->k25 }}">
  <div class="card-header">
    <h3 class="card-title text-capitalize font-weight-bold">Profil Dosen</h3><br>
    <p class="m-0">Dosen tetap perguruan tinggi</p>
  </div>
  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="bg-red">
                <tr>
                    <th rowspan="2" class="va-middle text-center">No</th>
                    <th rowspan="2" class="va-middle text-center">Nama Dosen</th>
                    <th rowspan="2" class="va-middle text-center">NIDN/NIDK</th>
                    <th class="text-center va-middle text-center" colspan="2">Nama Prodi Pascasarjana</th>
                    <th rowspan="2" class="va-middle text-center">Bidang Keahlian</th>
                    <th rowspan="2" class="va-middle text-center">Kesesuaian deng Kompetensi Inti PS</th>
                    <th rowspan="2" class="va-middle text-center">Jabatan Akademik</th>
                    <th rowspan="2" class="va-middle text-center">Nomor Sertifikat Pendidikan Profesional</th>
                    <th rowspan="2" class="va-middle text-center">Mata Kuliah yang Diampu pada PS yang Diakreditasi</th>
                    <th rowspan="2" class="va-middle text-center">Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu</th>
                    <th rowspan="2" class="va-middle text-center">Mata Kuliah yang Diampu pada PS Lain</th>
                </tr>
                <tr>
                    <th class="text-center va-middle text-center">Magister/ Magister Terapan</th>
                    <th class="text-center va-middle text-center">Doktor/ Doktor Terapan</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($collection as $no => $item)                  
              <tr>
                <td>{{ $no+1 }}</td>
                <td>{{ $item->user->nama }}</td>
                <td>{{ $item->user->id }}</td>
                <td>{{ $item->prodi_s2 == null ? '-' : $item->prodi_s2 }}</td>
                <td>{{ $item->prodi_s3 == null ? '-' : $item->prodi_s3 }}</td>
                <td>{{ $item->bidang_keahlian == null ? '-' : $item->bidang_keahlian }}</td>
                <td>{{ $item->kesesuaian_bidang_keahlian == null ? 'Ya' : 'Tidak' }}</td>
                <td>{{ $item->jabatan_akademik == null ? '-' : $item->jabatan_akademik }}</td>
                <td>{{ $item->nomor_sertifikat_pendidikan_profesional == null ? '-' : $item->nomor_sertifikat_pendidikan_profesional }}</td>
                <td>
                  @if ($item->matakuliah_diampu == '[]')
                      -
                  @else
                  <ul class="list-unstyled">
                    @foreach (json_decode($item->matakuliah_diampu) as $m)
                    <li>{{ $m }}</li>
                    @endforeach
                  </ul>
                  @endif
                </td>
                <td>{{ $item->kesesuaian_matakuliah_diampu == null ? 'Ya' : 'Tidak' }}</td>
                <td>
                  @if ($item->matakuliah_diampu_pada_prodi_lain == '[]')
                      -
                  @else
                  <ul class="list-unstyled">
                    @foreach (json_decode($item->matakuliah_diampu_pada_prodi_lain) as $m)
                    <li>{{ $m }}</li>
                    @endforeach
                  </ul>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>
<!-- /.card -->
@endsection