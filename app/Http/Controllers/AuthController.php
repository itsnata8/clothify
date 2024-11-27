<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        if (Auth::attempt($creds, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->with(
            'fail',
            'The provided credentials do not match our records.',
        );
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

        if (User::create($newUser)) {
            return redirect()->route('login')->with('success', 'Registration successful');
        }
        return redirect()->back()->with('fail', 'Registration failed');
    }
}
