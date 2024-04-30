<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditUserController extends Controller
{
    // Edit Username
    public function changeUsername()
    {
        return view('IsslerBlog.Authenticate.IsslerBlog-newUsername');
    }
}
