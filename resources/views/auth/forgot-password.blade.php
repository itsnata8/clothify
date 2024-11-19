@extends('admin.layout.auth-layout')
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Forgot Password</h2>
        </div>
        <form>
            <div class="form-group">
                <label for="username">Email Address</label>
                <input type="text" class="form-control form-control-lg" placeholder="Email Address">

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <!--
                                                                                        use code for form submit
                                                                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                                                                                    -->
                        <a class="btn btn-primary btn-lg btn-block" href="index.html">Submit</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
