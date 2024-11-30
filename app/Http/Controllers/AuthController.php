<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        $data = [
            'pageTitle' => 'Login',
        ];
        return view('auth.login', $data);
    }
    public function loginAction(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:users,email',
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' => 'Email or Username is required',
                'login_id.exists' => 'Email does not exist',
                'password.required' => 'Password is required',
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:users,username',
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' => 'Email or Username is required',
                'login_id.exists' => 'Username does not exist',
                'password.required' => 'Password is required',
            ]);
        }
        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password,
        );
        $remember = $request->remember_me == 'on' ? true : false;

        $isVerified = DB::table('users')
            ->where('email', $request->login_id)
            ->where('email_verified_at', '!=', null)
            ->first();

        if (Auth::attempt($creds, $remember)) {
            $request->session()->regenerate();
            if ($isVerified != null) {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->route('verification.notice');
            }
        } else {
            return redirect()->back()->with(
                'fail',
                'The provided credentials do not match our records.',
            );
        }
    }
    public function register()
    {
        $data = [
            'pageTitle' => 'Register',
        ];
        return view('auth.register', $data);
    }
    public function registerAction(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:5|max:45',
            'confirm_password' => 'required|same:password',
        ], [
            'email.required' => 'Email is required',
            'email.unique' => 'Email already exists',
            'username.required' => 'Username is required',
            'username.unique' => 'Username already exists',
            'phone.required' => 'Phone Number is required',
            'phone.unique' => 'Phone Number already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 5 characters',
            'password.max' => 'Password must be at most 45 characters',
            'confirm_password.required' => 'Confirm Password is required',
            'confirm_password.same' => 'Confirm Password does not match',
        ]);
        if (!$validated) {
            return redirect()->back()->withErrors($validated);
        }

        $newUser = [
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'address' => $request->address,
        ];


        $user = User::create($newUser);


        if ($user) {
            event(new Registered($user));

            Auth::login($user);
            return redirect()->route('verification.notice');
        }
        return redirect()->back()->with('fail', 'Registration failed');
    }
    public function forgotPassword()
    {
        $data = [
            'pageTitle' => 'Forgot Password',
        ];

        return view('auth.forgot-password', $data);
    }
    public function forgotPasswordAction(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', __($status))
            : back()->with('fail', __($status));
    }
    public function resetPassword($token)
    {
        $data = [
            'pageTitle' => 'Reset Password',
        ];

        return view('auth.reset-password', ['token' => $token, 'email' => $_GET['email']], $data);
    }

    public function resetPasswordAction(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
            ?  redirect()->route('login')->with('success', __($status))
            : back()->with('fail', __($status));
    }

    public function getEmailVerify()
    {
        $data = [
            'pageTitle' => 'Email Verification',
        ];
        return view('auth.email-verify', $data);
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('home')->with('success', 'Your email has been successfully verified!');
    }

    public function sendVerificationEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification email sent!');
    }
}
