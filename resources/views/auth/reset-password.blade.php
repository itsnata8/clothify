@extends('admin.layout.auth-layout')
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Reset Password</h2>
        </div>
        <form>
            <div class="form-group">
                <label for="new_password" class="form-label">New Password*</label>
                <input type="password" name="new_password" class="form-control form-control-lg" placeholder="**********">
            </div>
            <div class="form-group">
                <label for="confirm_password" class="form-label">Confirm Password*</label>
                <input type="password" name="confirm_password" class="form-control form-control-lg"
                    placeholder="**********">
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <!--
                                            use code for form submit
                                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                                            -->
                        <a class="btn btn-primary btn-lg btn-block" href="index.html">Register</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
