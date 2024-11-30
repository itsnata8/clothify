@extends('admin.layout.auth-layout')
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Reset Password</h2>
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
        <form method="post" action="{{ route('password-reset.action') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <div class="form-group">
                <label for="password" class="form-label">New Password*</label>
                <input type="password" name="password" class="form-control form-control-lg" placeholder="**********">
            </div>
            @error('password')
                <div class="d-block text-danger" style="margin-top: -20px;margin-bottom: 10px;">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm Password*</label>
                <input type="password" name="password_confirmation" class="form-control form-control-lg"
                    placeholder="**********">
            </div>
            @error('password')
                <div class="d-block text-danger" style="margin-top: -20px;margin-bottom: 10px;">{{ $message }}</div>
            @enderror
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Reset Password">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
