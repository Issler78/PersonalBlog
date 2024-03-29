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

        if (!Auth::attempt($credentials))
        {
            return redirect()->route('IsslerBlog.authenticate')->withInput($request->only('email'))->with('incorrect', 'Email or password are incorrect.');
        }

        return redirect()->intended(route('IsslerBlog.index'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('IsslerBlog.index');
    }
}
