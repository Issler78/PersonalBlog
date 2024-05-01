<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EditUserController extends Controller
{
    // Edit Username
    public function changeUsername()
    {
        return view('IsslerBlog.Authenticate.IsslerBlog-newUsername');
    }

    public function store(Request $request)
    {
        $request->validate([
            'new_username' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('users', 'username')->ignore(Auth::user()->id)
            ]
        ]);

        $user = User::where('email', Auth::user()->email)->first();
        $user->update([
            "username" => $request->new_username
        ]);

        return redirect()->route('IsslerBlog.index')->with('message', 'Your Username has been Successfully Updated!');
    }

    //Delete User
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('IsslerBlog.authenticate')->withFragment('register');
    }
}
