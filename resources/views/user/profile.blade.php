@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{ url('assets/') }}/img/default.png"
                   alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $user->nama }}</h3>

            <p class="text-muted text-center">{{ $user->role->name }}</p>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link @if($errors->first('nama') == null && $errors->first('old_password') == null && $errors->first('password') == null) active @endif" href="#activity" data-toggle="tab">Tentang</a></li>
              <li class="nav-item"><a class="nav-link @error('nama') active @enderror" href="#settings" data-toggle="tab">Pengaturan</a></li>
              @if(Auth::user()->role_id != 1 || Auth::user()->id == $user->id)
              <li class="nav-item"><a class="nav-link @error('old_password') active @else @error('password') active @enderror @enderror" href="#ubah_password" data-toggle="tab">Ubah Password</a></li>
              @endif
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
                <div class=" @if($errors->first('nama') == null && $errors->first('old_password') == null && $errors->first('password') == null) active @endif tab-pane" id="activity">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <div class="card-body">
                        <strong><i class="fa fa-user mr-1"></i> Nama Lengkap</strong>
            
                        <p class="text-muted">
                            {{ $user->nama }}
                        </p>
            
                        <hr>
            
                        <strong><i class="fa fa-user-lock mr-1"></i> {{ $user->role_id == 2 ? 'NIDN' : 'Username' }}</strong>
            
                        <p class="text-muted">{{ $user->username }}</p>
            
                        <hr>
            
                        <strong><i class="fa fa-universal-access mr-1"></i> Akses</strong>
            
                        <p class="text-muted">{{ $user->role->name }}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <div class="@error('nama') active @enderror tab-pane" id="settings">
                    <form class="form-horizontal" method="POST" action="{{ route('user.profile', $user->id) }}">@csrf
                        <div class="form-group row">
                          <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{ $user->nama }}">
                            @error('nama')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                          </div>
                        </div>
                    </form>
                </div>
                @if($user->role_id != 1 || Auth::user()->id == $user->id)
                <div class="@error('old_password') active @enderror  @error('password') active @enderror tab-pane" id="ubah_password">
                    <form class="form-horizontal" method="POST" action="{{ route('user.profile', $user->id) }}">@csrf
                        <div class="form-group row">
                          <label for="old_password" class="col-sm-2 col-form-label">Password Lama</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password" placeholder="Password Lama">
                            @error('old_password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror 
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                            @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror 
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password Baru">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
@endsection