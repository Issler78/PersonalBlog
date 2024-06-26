<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NewPasswordController extends Controller
{
    public function index(string $token)
    {
        $passwordToken = DB::table('password_reset_tokens')->where('token', $token)->first();
        $email = $passwordToken->email;

        return view('IsslerBlog.Authenticate.IsslerBlog-newPassword', compact('token', 'email'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        if (!$passwordToken = DB::table('password_reset_tokens')->where('token', $request->token)->first())
        {
            abort(401, 'Unauthorized');
        }

        if ($passwordToken->expires_at < Carbon::now())
        {
            return redirect()->back()->with('invalid_link', 'Expired link');
        }
        

        $user = User::where('email', $passwordToken->email)->first();
        $user->update([
            "password" => Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')->where('token', $request->token)->delete();



        if (Auth::check())
        {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route('IsslerBlog.authenticate')->with('reset-password', 'Password Reset Successfuly!');
    }
}
