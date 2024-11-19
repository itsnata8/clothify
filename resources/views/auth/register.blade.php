@extends('admin.layout.auth-layout')
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Register</h2>
        </div>
        <form>
            <div class="form-group">
                <label for="email" class="form-label">Email Address*</label>
                <input type="text" name="email" class="form-control form-control-lg" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="username" class="form-label">Username*</label>
                <input type="text" name="username" class="form-control form-control-lg" placeholder="Username">
            </div>

            <div class="form-group">
                <label>Phone Number*</label>
                <input class="form-control" placeholder="Phone Number" type="tel">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password*</label>
                <input type="password" name="password" class="form-control form-control-lg" placeholder="**********">
            </div>
            <div class="form-group">
                <label for="confirm_password" class="form-label">Confirm Password*</label>
                <input type="password" name="confirm_password" class="form-control form-control-lg"
                    placeholder="**********">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" placeholder="Address"></textarea>
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
