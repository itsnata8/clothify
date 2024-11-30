@extends('admin.layout.auth-layout')
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Verify your Email</h2>
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
        <p>A verification link has been sent to your email. Before proceeding, please check your email for a
            verification link. If you did not receive the email, please check your spam folder.</p>
        <p>Thank you.</p>
        <br>
        <p>
        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <input class="text-primary border-0 bg-white " type="submit" value="Click here"> if you did not receive the
            email.</p>
        </form>

    </div>
@endsection
