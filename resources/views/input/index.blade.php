@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="card card-outline card-lightblue">
      <div class="card-header">
        <h3 class="card-title">Profil Dosen</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="list-group">
          <a class="list-group-item @if(Request::routeIs('input.A')) active @endif" href="{{ route('input.A', $user->id) }}">Dosen Tetap Perguruan Tinggi</a>
        </div>
      </div>
    </div>
    <div class="card card-outline card-lightblue">
      <div class="card-header">
        <h3 class="card-title">Kinerja Dosen</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="list-group">
          <a class="list-group-item @if(Request::routeIs('input.B')) active @endif" href="{{ route('input.B', $user->id) }}">Penelitian DTPS</a>
          <a class="list-group-item @if(Request::routeIs('input.C')) active @endif" href="{{ route('input.C', $user->id) }}">Pengabdian Kepada Masyarakat</a>
          <a class="list-group-item @if(Request::routeIs('input.D')) active @endif" href="{{ route('input.D', $user->id) }}">Publikasi Ilmiah DTPS</a>
          <a class="list-group-item @if(Request::routeIs('input.E')) active @endif" href="{{ route('input.E', $user->id) }}">Karya Ilmiah DTPS</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="card card-outline card-lightblue">
      <div class="card-header">
        <h3 class="card-title text-capitalize font-weight-bold">Profil Dosen</h3><br>
        <p>A. Dosen tetap perguruan tinggi</p>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('input.A', $user->id) }}" enctype="multipart/form-data">@csrf
          <div class="form-group">
            <label>Nama Dosen</label>
            <input type="text" class="form-control" value="{{ $user->nama }}" disabled>
          </div>
          <div class="form-group">
            <label>NIDN</label>
            <input type="text" class="form-control" value="{{ $user->id }}" disabled>
          </div>
          <div class="form-group">
            <label for="pendidikan_pasca_sarjana">Pendidikan Pasca Sarjana</label>
            <select name="pendidikan_pasca_sarjana" class="form-control @error('pendidikan_pasca_sarjana') is-invalid @enderror">
              <option value="">Pilih</option>
              <option value="Magister / Magister Terapan">Magister / Magister Terapan</option>
              <option value="Doctor / Doctor Terapan">Doctor / Doctor Terapan</option>
            </select>
            @error('pendidikan_pasca_sarjana')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group d-none" id="s2">
            <label for="prodi_s2">Magister / Magister Terapan</label>
            <div class="input-group">
              <button type="button" class="btn @error('ijasah_s2') btn-outline-danger @else btn-primary @enderror btn-flat btn-file" title="Upload Ijasah S2" target="ijasah_s2"><i class="fa fa-upload"></i> Upload</button>
              <input type="text" class="form-control @error('prodi_s2') is-invalid @enderror" id="prodi_s2" name="prodi_s2" placeholder="Nama prodi">
              <input class="d-none" type="file" name="ijasah_s2">
              @error('ijasah_s2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              @error('prodi_s2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <span class="text-danger font-weight-bold">* File ijasah dengan format pdf</span>
          </div>
          <div class="form-group d-none" id="s3">
            <label for="prodi_s3">Doctor / Doctor Terapan</label>
            <div class="input-group">
              <button type="button" class="btn @error('ijasah_s3') btn-outline-danger @else btn-primary @enderror btn-flat btn-file" title="Upload Ijasah S3" target="ijasah_s3"><i class="fa fa-upload"></i> Upload</button>
              <input type="text" class="form-control @error('prodi_s3') is-invalid @enderror" id="prodi_s3" name="prodi_s3" placeholder="Nama prodi">
              <input class="d-none" type="file" name="ijasah_s3">
              @error('ijasah_s3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              @error('prodi_s3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <span class="text-danger font-weight-bold">* File ijasah dengan format pdf</span>
          </div>              
          <div class="form-group">
            <label for="bidang_keahlian">Bidang Keahlian</label>
            <input type="text" class="form-control @error('bidang_keahlian') is-invalid @enderror" id="bidang_keahlian" name="bidang_keahlian">
            @error('bidang_keahlian')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <div class="icheck-primary d-inline">
              <input class="@error('kesesuaian_bidang_keahlian') is-invalid @enderror" type="checkbox" id="kesesuaian_bidang_keahlian" value="ya">
              <label for="kesesuaian_bidang_keahlian">
                Kesesuaian dengan Kompetisi Inti Program Studi
              </label>
              @error('bidang_keahlian')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="jabatan_akademik">Jabatan Akademik</label>
            <div class="input-group">
              <button type="button" class="btn @error('sk_jabatan_akademik') btn-outline-danger @else btn-primary @enderror btn-flat btn-file" target="sk_jabatan_akademik"><i class="fa fa-upload"></i> Upload</button>
              <select name="jabatan_akademik" id="jabatan_akademik" class="form-control @error('jabatan_akademik') is-invalid @enderror">
                <option value="">Pilih</option>
                <option value="Tenaga Pengajar">Tenaga Pengajar</option>
                <option value="Asisten Ahli">Asisten Ahli</option>
                <option value="Lektor">Lektor</option>
                <option value="Lektor Kepala">Lektor Kepala</option>
                <option value="Guru Besa">Guru Besa</option>
              </select>
              <input type="file" class="form-control d-none" name="sk_jabatan_akademik">
              @error('sk_jabatan_akademik')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              @error('jabatan_akademik')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <span class="text-danger font-weight-bold">* File Fungsional dan Golongan format pdf</span>
          </div>
          <div class="form-group">
            <label for="nomor_sertifikat_pendidikan_profesional">Setifikat Pendidikan Profesional</label>
            <div class="input-group">
              <button type="button" class="btn @error('sk_jabatan_akademik') btn-outline-danger @else btn-primary @enderror btn-flat btn-file" target="sertifikat_pendidikan_profesional"><i class="fa fa-upload"></i> Upload</button>
              <input type="text" class="form-control @error('nomor_sertifikat_pendidikan_profesional') is-invalid @enderror" name="nomor_sertifikat_pendidikan_profesional" id="nomor_sertifikat_pendidikan_profesional" placeholder="Nomor Sertifikat">
              <input type="file" class="form-control d-none" name="sertifikat_pendidikan_profesional">
              @error('sertifikat_pendidikan_profesional')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              @error('nomor_sertifikat_pendidikan_profesional')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <span class="text-danger font-weight-bold">* File Sertifikat Pendidikan Profesional format pdf</span>
          </div>
          <div class="form-group">
            <label for="matakuliah_diampu">Mata Kuliah yang Diampu</label>
            <select class="form-control select2 @error('matakuliah_diampu') is-invalid @enderror" name="matakuliah_diampu" id="matakuliah_diampu" multiple="multiple" data-placeholder="Mata Kuliah yang Diampu">
              <option value="">Pilih</option>
              @foreach (DB::table('matakuliah')->where('prodi', 'mesin')->get() as $m)
              <option value="{{ $m->nama }}">{{ $m->nama }}</option>
              @endforeach
            </select>
            @error('nomor_sertifikat_pendidikan_profesional')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <div class="icheck-primary d-inline">
              <input class="@error('kesesuaian_matakuliah_diampu') is-invalid @enderror" type="checkbox" id="kesesuaian_matakuliah_diampu" name="kesesuaian_matakuliah_diampu" value="ya">
              <label for="kesesuaian_matakuliah_diampu">
                Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu
              </label>
              @error('kesesuaian_matakuliah_diampu')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="matakuliah_diampu_pada_prodi_lain">Mata Kuliah yang Diampu Pada Prodi Lain</label>
            <select name="matakuliah_diampu_pada_prodi_lain" id="matakuliah_diampu_pada_prodi_lain" class="form-control select2 @error('matakuliah_diampu_pada_prodi_lain') is-invalid @enderror" multiple="multiple" data-placeholder="Mata Kuliah yang Diampu Pada Prodi Lain">
              <option value="">Pilih</option>
              @foreach (DB::table('matakuliah')->where('prodi', 'lain')->get() as $m)
              <option value="{{ $m->nama }}">{{ $m->nama }}</option>
              @endforeach
            </select>
            @error('matakuliah_diampu_pada_prodi_lain')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="text-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection