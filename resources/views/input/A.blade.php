@extends('layouts.app')

@section('content')
<div class="row">
  @include('input.menu')
  <div class="col-md-9">
    <div class="card card-outline card-lightblue">
      <div class="card-header">
        <h3 class="card-title text-capitalize font-weight-bold">Profil Dosen</h3><br>
        <p class="m-0">A. Dosen tetap perguruan tinggi</p>
        <p class="m-0"><span class="text-danger font-weight-bold">*</span> Wajib diisi</p>
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
            <label for="pendidikan_pasca_sarjana">Pendidikan Pasca Sarjana <span class="text-danger font-weight-bold">*</span></label>
            <select name="pendidikan_pasca_sarjana" class="form-control masukan-select @error('pendidikan_pasca_sarjana') is-invalid @enderror">
              <option value="">Pilih</option>
              @if(old('pendidikan_pasca_sarjana'))
                <option @if(old('pendidikan_pasca_sarjana') == 's2') selected @endif value="s2">Magister / Magister Terapan</option>
                <option @if(old('pendidikan_pasca_sarjana') == 's3') selected @endif value="s3">Doctor / Doctor Terapan</option>
              @else
                <option @if($inputA->pendidikan_pasca_sarjana == 's2') selected @endif value="s2">Magister / Magister Terapan</option>
                <option @if($inputA->pendidikan_pasca_sarjana == 's3') selected @endif value="s3">Doctor / Doctor Terapan</option>
              @endif
            </select>
            @error('pendidikan_pasca_sarjana')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group @if (old('pendidikan_pasca_sarjana')) @if (old('pendidikan_pasca_sarjana') != 's2' && old('pendidikan_pasca_sarjana') != 's3') d-none @endif @else @if($inputA->pendidikan_pasca_sarjana != 's2' && $inputA->pendidikan_pasca_sarjana != 's3') d-none @endif @endif" id="s2">
            <label for="prodi_s2">Magister / Magister Terapan <span class="text-danger font-weight-bold">*</span></label>
            <div class="input-group">
              <button type="button" class="btn @error('ijasah_s2') btn-outline-danger @else btn-primary @enderror btn-flat btn-file" title="Upload Ijasah S2" target="ijasah_s2"><i class="fa fa-upload"></i> Upload</button>
              <input type="text" class="form-control masukan-text @error('prodi_s2') is-invalid @enderror" id="prodi_s2" name="prodi_s2" placeholder="Nama prodi" value="@if(old('prodi_s2')) {{ old('prodi_s2') }} @else {{ $inputA->prodi_s2 }} @endif">
              @error('prodi_s2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              <input class="d-none masukan-file @error('ijasah_s2') is-invalid @enderror" type="file" name="ijasah_s2" accept=".pdf">
              @error('ijasah_s2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <span class="text-danger font-weight-bold">* File ijasah dengan format pdf</span>
          </div>

          <div class="form-group @if (old('pendidikan_pasca_sarjana')) @if (old('pendidikan_pasca_sarjana') != 's3') d-none @endif @else @if($inputA->pendidikan_pasca_sarjana != 's3') d-none @endif @endif" id="s3">
            <label for="prodi_s3">Doctor / Doctor Terapan <span class="text-danger font-weight-bold">*</span></label>
            <div class="input-group">
              <button type="button" class="btn @error('ijasah_s3') btn-outline-danger @else btn-primary @enderror btn-flat btn-file" title="Upload Ijasah S3" target="ijasah_s3"><i class="fa fa-upload"></i> Upload</button>
              <input type="text" class="form-control masukan-text @error('prodi_s3') is-invalid @enderror" id="prodi_s3" name="prodi_s3" placeholder="Nama prodi" value="@if(old('prodi_s3')) {{ old('prodi_s3') }} @else {{ $inputA->prodi_s3 }} @endif">
              @error('ijasah_s3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              <input class="d-none" type="file" name="ijasah_s3" accept=".pdf">
              @error('prodi_s3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <span class="text-danger font-weight-bold">* File ijasah dengan format pdf</span>
          </div>  

          <div class="form-group">
            <label for="bidang_keahlian">Bidang Keahlian <span class="text-danger font-weight-bold">*</span></label>
            <input type="text" class="form-control masukan-text @error('bidang_keahlian') is-invalid @enderror" id="bidang_keahlian" name="bidang_keahlian" value="@if(old('bidang_keahlian')) {{ old('bidang_keahlian') }} @else {{ $inputA->bidang_keahlian }} @endif">
            @error('bidang_keahlian')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <div class="icheck-primary d-inline">
              <input @if($inputA->kesesuaian_bidang_keahlian) checked @endif class="masukan-check @error('kesesuaian_bidang_keahlian') is-invalid @enderror" type="checkbox" id="kesesuaian_bidang_keahlian" name="kesesuaian_bidang_keahlian" value="ya">
              <label for="kesesuaian_bidang_keahlian">
                Kesesuaian dengan Kompetensi Inti Program Studi
              </label>
              @error('kesesuaian_bidang_keahlian')
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
              <select name="jabatan_akademik" id="jabatan_akademik" class="form-control masukan-select @error('jabatan_akademik') is-invalid @enderror">
                <option value="">Pilih</option>
                <option @if($inputA->jabatan_akademik == 'Tenaga Pengajar') selected @endif value="Tenaga Pengajar">Tenaga Pengajar</option>
                <option @if($inputA->jabatan_akademik == 'Asisten Ahli') selected @endif value="Asisten Ahli">Asisten Ahli</option>
                <option @if($inputA->jabatan_akademik == 'Lektor') selected @endif value="Lektor">Lektor</option>
                <option @if($inputA->jabatan_akademik == 'Lektor Kepala') selected @endif value="Lektor Kepala">Lektor Kepala</option>
                <option @if($inputA->jabatan_akademik == 'Guru Besar') selected @endif value="Guru Besar">Guru Besar</option>
              </select>
              <input type="file" class="form-control d-none" name="sk_jabatan_akademik" accept=".pdf">
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
              <input type="text" class="form-control masukan-text @error('nomor_sertifikat_pendidikan_profesional') is-invalid @enderror" name="nomor_sertifikat_pendidikan_profesional" id="nomor_sertifikat_pendidikan_profesional" placeholder="Nomor Sertifikat" value="{{ $inputA->nomor_sertifikat_pendidikan_profesional }}">
              <input type="file" class="form-control d-none" name="sertifikat_pendidikan_profesional" accept=".pdf">
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
            <select class="form-control select2 masukan-select @error('matakuliah_diampu') is-invalid @enderror" name="matakuliah_diampu[]" id="matakuliah_diampu" multiple="multiple" data-placeholder="Mata Kuliah yang Diampu">
              <option value="">Pilih</option>
              @foreach (DB::table('matakuliah')->where('prodi', 'mesin')->get() as $m)
              <option @if(in_array($m->nama, json_decode($inputA->matakuliah_diampu ? $inputA->matakuliah_diampu : '[]'))) selected @endif value="{{ $m->nama }}">{{ $m->nama }}</option>
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
              <input @if($inputA->kesesuaian_matakuliah_diampu) checked @endif class="masukan-check @error('kesesuaian_matakuliah_diampu') is-invalid @enderror" type="checkbox" id="kesesuaian_matakuliah_diampu" name="kesesuaian_matakuliah_diampu" value="ya">
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
            <select name="matakuliah_diampu_pada_prodi_lain[]" id="matakuliah_diampu_pada_prodi_lain" class="masukan-select form-control select2 @error('matakuliah_diampu_pada_prodi_lain') is-invalid @enderror" multiple="multiple" data-placeholder="Mata Kuliah yang Diampu Pada Prodi Lain">
              <option value="">Pilih</option>
              @foreach (DB::table('matakuliah')->where('prodi', 'lain')->get() as $m)
              <option @if(in_array($m->nama, json_decode($inputA->matakuliah_diampu_pada_prodi_lain ? $inputA->matakuliah_diampu_pada_prodi_lain : '[]'))) selected @endif value="{{ $m->nama }}">{{ $m->nama }}</option>
              @endforeach
            </select>
            @error('matakuliah_diampu_pada_prodi_lain')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="text-right">
            <button class="btn btn-primary swalDefaultSuccess"><i class="fa fa-save"></i> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('select[name=pendidikan_pasca_sarjana]').on('change', function(){
        if($(this).val() == "s2"){
            $('#s2').hasClass('d-none') ? $('#s2').removeClass('d-none') : '';
            $('#s3').hasClass('d-none') ? '' : $('#s3').addClass('d-none');
        }else if($(this).val() == "s3"){
            $('#s2').hasClass('d-none') ? $('#s2').removeClass('d-none') : '';
            $('#s3').hasClass('d-none') ? $('#s3').removeClass('d-none') : '';
        }else{
            $('#s2').addClass('d-none')
            $('#s3').addClass('d-none')
        }
    });

    $('.btn-file').click(function(){
        $('input[name= '+ $(this).attr('target') +']').click();
    });
  });

</script>
@endsection