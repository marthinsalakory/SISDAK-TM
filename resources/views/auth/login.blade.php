@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="{{ url('/') }}"><b>{{ env('APP_NAME') }}</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-header">
            <div class="text-center">
                <img src="{{ url('/assets/img/mesin.jpg') }}" width="200" alt="Hotumese"><br>
                <div class="pemisah0"></div>
                <b>Fakultas Teknik Universitas Pattimura<br><i class="fa fa-lock"></i> Single Sign On :: Login Page</b>
            </div>
        </div>
        <div class="card-body login-card-body">
            <form action="{{ route('login') }}" method="POST">@csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
                </div>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                    Remember Me
                    </label>
                </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                <button type="submit" class="btn bg-lightblue btn-block">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
            </form>
            <!-- /.social-auth-links -->
    
            @if (Route::has('password.request'))
            <p class="mb-1">
            <a href="{{ route('password.request') }}">I forgot my password</a>
            </p>
            @endif
            @if (Route::has('register'))
            <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
            </p>
            @endif
        </div>
      <!-- /.login-card-body -->
    </div>
</div>
@endsection
