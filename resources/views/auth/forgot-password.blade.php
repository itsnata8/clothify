@extends('admin.layout.auth-layout')
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Forgot Password</h2>
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
        <form method="post" action="{{ route('forgot-password.action') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control form-control-lg" placeholder="Email Address">
            </div>
            @error('email')
                <div class="d-block text-danger" style="margin-top: -20px;margin-bottom: 10px;">{{ $message }}</div>
            @enderror
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
