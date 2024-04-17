<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewPasswordController extends Controller
{
    public function index(string $token)
    {
        $passwordToken = DB::table('password_reset_tokens')->where('token', $token)->first();
        $email = $passwordToken->email;

        return view('IsslerBlog.Authenticate.IsslerBlog-newPassword', compact('token', 'email'));
    }
}
