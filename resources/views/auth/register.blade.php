@extends('admin.layout.auth-layout')
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Register</h2>
        </div>
        <form method="post" action="{{ route('register.action') }}">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email Address*</label>
                <input type="text" name="email" class="form-control form-control-lg" placeholder="Email">
            </div>
            @error('email')
                <div class="d-block text-danger" style="margin-top: -20px;margin-bottom: 10px;">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="username" class="form-label">Username*</label>
                <input type="text" name="username" class="form-control form-control-lg" placeholder="Username">
            </div>
            @error('username')
                <div class="d-block text-danger" style="margin-top: -20px;margin-bottom: 10px;">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="phone" class="form-label">Phone Number*</label>
                <input class="form-control" name="phone" placeholder="Phone Number" type="tel"
                    pattern="^[0-9\-\+\s\(\)]*$">
            </div>
            @error('phone')
                <div class="d-block text-danger" style="margin-top: -20px;margin-bottom: 10px;">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="password" class="form-label">Password*</label>
                <input type="password" name="password" class="form-control form-control-lg" placeholder="**********">
            </div>
            @error('password')
                <div class="d-block text-danger" style="margin-top: -20px;margin-bottom: 10px;">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="confirm_password" class="form-label">Confirm Password*</label>
                <input type="password" name="confirm_password" class="form-control form-control-lg"
                    placeholder="**********">
            </div>
            @error('confirm_password')
                <div class="d-block text-danger" style="margin-top: -20px;margin-bottom: 10px;">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" name="address" placeholder="Address"></textarea>
            </div>
            @error('address')
                <div class="d-block text-danger" style="margin-top: -20px;margin-bottom: 10px;">{{ $message }}</div>
            @enderror
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
