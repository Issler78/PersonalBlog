<?php

namespace App\Http\Controllers\Auth;

use App\Events\VerifyEmailEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    public function index(?string $resendMessage = null)
    {
        VerifyEmailEvent::dispatch(Auth::user());

        if (isset($resendMessage))
        {
            return view('IsslerBlog.Authenticate.IsslerBlog-verify-email', ['email' => Auth::user()->email, 'resend' => 'A new code has been sent.']);
        }

        return view('IsslerBlog.Authenticate.IsslerBlog-verify-email', ['email' => Auth::user()->email]);
    }

    public function verify(Request $request)
    {
        $code = $request->code;
        $user = $request->user();

        if ($code != $user->verification_code)
        {
            return back()->with('incorrect', 'Code is incorrect. A new code has been sent.');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect()->route('IsslerBlog.index');
    }
}
