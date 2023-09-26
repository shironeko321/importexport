<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login()
    {
        if (Auth::guard("admin")->check()) {
            return redirect()->route("dashboard");
        }

        return view("auth.login");
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard("admin")->attempt($credentials, $request->has("remember"))) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard("admin")->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("dashboard");
    }
}
