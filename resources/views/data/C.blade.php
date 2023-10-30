@extends('layouts.app')
@section('content')
<!-- Default box -->
<div class="card card-outline card-{{ DB::table('pengaturan')->first()->k25 }}">
  <div class="card-header">
    <h3 class="card-title text-capitalize font-weight-bold">Kinerja Dosen</h3><br>
    <p class="m-0">Pengabdian Kepada Masyarakat (PKM) DTPS</p>
  </div>
  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="bg-lightblue">
                <tr>
                    <th rowspan="2" class="va-middle text-center">No</th>
                    <th rowspan="2" class="va-middle text-center">Sumber Pembiayaan</th>
                    <th class="text-center va-middle text-center" colspan="3">Jumlah Judul PKM</th>
                    <th rowspan="2" class="va-middle text-center">Jumlah</th>
                </tr>
                <tr>
                    <th class="text-center va-middle text-center">TS-2</th>
                    <th class="text-center va-middle text-center">TS-1</th>
                    <th class="text-center va-middle text-center">TS</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>A. Perguruan Tinggi<br>B. Mandiri</td>
                <td class="text-center"><a href="{{route('data.linkC', ['Perguruan Tinggi Mandiri', 'TS-2'])}}">{{ $collection->where('sumber_pembiayaan', 'Perguruan Tinggi Mandiri')->where('tahun', 'TS-2')->count() }}</a></td>
                <td class="text-center"><a href="{{route('data.linkC', ['Perguruan Tinggi Mandiri', 'TS-1'])}}">{{ $collection->where('sumber_pembiayaan', 'Perguruan Tinggi Mandiri')->where('tahun', 'TS-1')->count() }}</a></td>
                <td class="text-center"><a href="{{route('data.linkC', ['Perguruan Tinggi Mandiri', 'TS'])}}">{{ $collection->where('sumber_pembiayaan', 'Perguruan Tinggi Mandiri')->where('tahun', 'TS')->count() }}</a></td>
                <td class="text-center"><a href="{{route('data.linkC', ['Perguruan Tinggi Mandiri'])}}">{{ $collection->where('sumber_pembiayaan', 'Perguruan Tinggi Mandiri')->count() }}</a></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Lembaga Dalam Negeri (di luar PT)</td>
                <td class="text-center"><a href="{{route('data.linkC', ['Lembaga Dalam Negeri (diluar PT)', 'TS-2'])}}">{{ $collection->where('sumber_pembiayaan', 'Lembaga Dalam Negeri (diluar PT)')->where('tahun', 'TS-2')->count() }}</a></td>
                <td class="text-center"><a href="{{route('data.linkC', ['Lembaga Dalam Negeri (diluar PT)', 'TS-1'])}}">{{ $collection->where('sumber_pembiayaan', 'Lembaga Dalam Negeri (diluar PT)')->where('tahun', 'TS-1')->count() }}</a></td>
                <td class="text-center"><a href="{{route('data.linkC', ['Lembaga Dalam Negeri (diluar PT)', 'TS'])}}">{{ $collection->where('sumber_pembiayaan', 'Lembaga Dalam Negeri (diluar PT)')->where('tahun', 'TS')->count() }}</a></td>
                <td class="text-center"><a href="{{route('data.linkC', ['Lembaga Dalam Negeri (diluar PT)'])}}">{{ $collection->where('sumber_pembiayaan', 'Lembaga Dalam Negeri (diluar PT)')->count() }}</a></td>
              </tr>
              <tr>
                <td>3</td>
                <td>Lembaga Luar Negeri</td>
                <td class="text-center"><a href="{{route('data.linkC', ['Lembaga Luar Negeri', 'TS-2'])}}">{{ $collection->where('sumber_pembiayaan', 'Lembaga Luar Negeri')->where('tahun', 'TS-2')->count() }}</a></td>
                <td class="text-center"><a href="{{route('data.linkC', ['Lembaga Luar Negeri', 'TS-1'])}}">{{ $collection->where('sumber_pembiayaan', 'Lembaga Luar Negeri')->where('tahun', 'TS-1')->count() }}</a></td>
                <td class="text-center"><a href="{{route('data.linkC', ['Lembaga Luar Negeri', 'TS'])}}">{{ $collection->where('sumber_pembiayaan', 'Lembaga Luar Negeri')->where('tahun', 'TS')->count() }}</a></td>
                <td class="text-center"><a href="{{route('data.linkC', ['Lembaga Luar Negeri'])}}">{{ $collection->where('sumber_pembiayaan', 'Lembaga Luar Negeri')->count() }}</a></td>
              </tr>
              <tr>
                <td class="text-center" colspan="2">Jumlah</td>
                <td class="text-center">{{ $collection->where('tahun', 'TS-2')->count() }}</td>
                <td class="text-center">{{ $collection->where('tahun', 'TS-1')->count() }}</td>
                <td class="text-center">{{ $collection->where('tahun', 'TS')->count() }}</td>
                <td class="text-center">{{ $collection->count() }}</td>
              </tr>
            </tbody>
        </table>
    </div>
  </div>
</div>
<!-- /.card -->
@endsection