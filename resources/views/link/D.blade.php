@extends('layouts.app')
@section('content')
<!-- Default box -->
<div class="card card-outline card-{{ DB::table('pengaturan')->first()->k25 }}">
  <div class="card-header">
    <div class="d-flex justify-content-between">
      <div>
        <h3 class="card-title text-capitalize font-weight-bold">{{$media}}</h3><br>
        <p class="m-0">Publikasi Ilmiah DTPS ({{$tahun}})</p>
      </div>
      <a href="{{route('data.D')}}" class="btn btn-warning"><i class="fa fa-backward"></i> Kembali</a>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="bg-lightblue">
              <tr>
                <th>No</th>
                <th>Judul Penelitian</th>
                <th>Tahun</th>
                <th>Link</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($collection as $k => $v)
              <tr>
                <td style="width: 50px">{{ $k + 1 }}</td>
                <td><a href="{{url('/storage/' . $v->file)}}">{{ $v->judul_penelitian }}</a></td>
                <td><a href="{{route('data.linkD', [$v->media_publikasi, $v->tahun])}}">{{ $v->tahun }}</a></td>
                <td><a href="{{$v->link_publikasi_ilmiah}}">{{ $v->link_publikasi_ilmiah }}</a></td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>
<!-- /.card -->
@endsection