@extends('layouts.app')
@section('content')
<!-- Default box -->
<div class="card card-outline card-{{ DB::table('pengaturan')->first()->k25 }}">
  <div class="card-header">
    <h3 class="card-title text-capitalize font-weight-bold">Kinerja Dosen</h3><br>
    <p class="m-0">Publikasi Ilmiah DTPS</p>
  </div>
  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="bg-lightblue">
                <tr>
                    <th rowspan="2" class="va-middle text-center">No</th>
                    <th rowspan="2" class="va-middle text-center">Jenis Publikasi</th>
                    <th class="text-center va-middle text-center" colspan="3">Jumlah Judul</th>
                    <th rowspan="2" class="va-middle text-center">Jumlah</th>
                </tr>
                <tr>
                    <th class="text-center va-middle text-center">TS-2</th>
                    <th class="text-center va-middle text-center">TS-1</th>
                    <th class="text-center va-middle text-center">TS</th>
                </tr>
            </thead>
            <tbody>
              @foreach (DB::table('media_publikasi')->get() as $k => $v)
              <tr>
                <td>{{ $k + 1 }}</td>
                <td>{{ $v->nama }}</td>
                <td class="text-center"><a href="{{route('data.linkD', [$v->nama, 'TS-2'])}}">{{ $collection->where('media_publikasi', $v->nama)->where('tahun', 'TS-2')->count() }}</a></td>
                <td class="text-center"><a href="{{route('data.linkD', [$v->nama, 'TS-1'])}}">{{ $collection->where('media_publikasi', $v->nama)->where('tahun', 'TS-1')->count() }}</a></td>
                <td class="text-center"><a href="{{route('data.linkD', [$v->nama, 'TS'])}}">{{ $collection->where('media_publikasi', $v->nama)->where('tahun', 'TS')->count() }}</a></td>
                <td class="text-center"><a href="{{route('data.linkD', [$v->nama])}}">{{ $collection->where('media_publikasi', $v->nama)->count() }}</a></td>
              </tr>
              @endforeach
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