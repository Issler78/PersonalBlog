<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'username_register' => 'required|min:3|max:255|unique:users,username',
                'email_register' => 'required|email|max:255|unique:users,email',
                'password_register' => 'required|min:8'
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->validator)->withFragment('register');
        }

        dd('passou');

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $remember = $request->boolean('remember');

        Auth::login($user, $remember);

        $request->session()->regenerateToken();

        return redirect()->route('IsslerBlog.verify.send');
    }
}
