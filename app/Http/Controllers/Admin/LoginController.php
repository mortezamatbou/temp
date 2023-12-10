<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function login_form(): View
    {
        return view('admin.login', ['title' => 'Login to dashboard']);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        // login successfully
        if (Auth::attempt($request->safe()->only(['email', 'password']))) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        // back to login page and show error
        return back()->withErrors([
            'email' => 'Username or Password is invalid'
        ])->onlyInput('email');
    }

}
