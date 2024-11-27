@extends('admin.layout.auth-layout')
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Login</h2>
        </div>
        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::get('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('fail') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form method="post" action="{{ route('login.action') }}">
            @csrf
            <div class="form-group">
                <label for="login_id">Username/Email</label>
                <input type="text" name="login_id" class="form-control form-control-lg" placeholder="Username/Email">
            </div>
            @error('login_id')
                <div class="d-block text-danger" style="margin-top: -20px;margin-bottom: 10px;">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control form-control-lg" placeholder="**********">
            </div>
            @error('password')
                <div class="d-block text-danger" style="margin-top: -20px ;margin-bottom: 10px;">{{ $message }}</div>
            @enderror
            <div class="row pb-30">
                <div class="col-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember_me" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Remember</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="forgot-password">
                        <a href="{{ route('forgot-password') }}">Forgot Password</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
