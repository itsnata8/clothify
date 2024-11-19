@extends('admin.layout.auth-layout')
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Login</h2>
        </div>
        <form>
            <div class="form-group">
                <label for="username">Username/Email</label>
                <input type="text" name="username" class="form-control form-control-lg" placeholder="Username/Email">
            </div>
            <div class="form-group">
                <label for="username">Password</label>
                <input type="password" class="form-control form-control-lg" placeholder="**********">
            </div>
            <div class="row pb-30">
                <div class="col-6">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Remember</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="forgot-password">
                        <a href="forgot-password.html">Forgot Password</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <!--
                                                use code for form submit
                                                <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                                            -->
                        <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
