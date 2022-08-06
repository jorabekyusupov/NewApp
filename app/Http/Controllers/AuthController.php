<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {

    }

    public function login_page()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $loginRequest)
    {
        $data = $loginRequest->validated();
        if (Auth::attempt($data)) {
            return redirect()->route('home');
        }
        return redirect()->back()->with('error', 'Invalid credentials');

    }

    public function register_page()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $registerRequest)
    {
        $data = $registerRequest->validated();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('login');

    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('login');
        }
     return   redirect()->back()->with('success', 'You are not logged in');
    }
}
