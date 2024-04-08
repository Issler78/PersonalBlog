<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthSessionController extends Controller
{
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->boolean('remember');

        if (!Auth::attempt($credentials, $remember))
        {
            $request->session()->regenerate();
            $request->session()->regenerateToken();

            return redirect()->route('IsslerBlog.authenticate')->withInput($request->only('email'))->with('incorrect', 'Email or password are incorrect.');
        }

        return redirect()->intended(route('IsslerBlog.index'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('IsslerBlog.index');
    }
}
