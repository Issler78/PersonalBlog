<?php

namespace App\Http\Controllers\Auth;

use App\Events\VerifyEmailEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    public function index()
    {
        VerifyEmailEvent::dispatch(Auth::user());

        return view('IsslerBlog.Authenticate.IsslerBlog-verify-email');
    }
}
