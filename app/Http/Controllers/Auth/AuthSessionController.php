<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthSessionController extends Controller
{
    public function auth(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->validator)->withFragment('login');
        }

        $remember = $request->boolean('remember');

        if (!Auth::attempt($credentials, $remember))
        {
            $request->session()->regenerate();
            $request->session()->regenerateToken();

            return redirect()->route('IsslerBlog.authenticate')->withInput($request->only('email'))->with('incorrect', 'Email or password are incorrect.');
        }

        return redirect()->route('IsslerBlog.verify.send');
    }

    public function logout(Request $request)
    {
        try {
            if ($user = $request->user())
            {
                $user->email_verified_at = null;
                $user->save();
            }
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Error: ' . $e], 500);
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('IsslerBlog.index');
    }
}
