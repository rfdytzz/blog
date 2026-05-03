<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangeController extends Controller
{
    public function changePage() {
        $user = Auth::User();
        return view('auth.user.change_password', compact('user'));
    }

    public function change(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required'
        ]);

        $password = Auth::user()->password;

        if (Hash::check($request->old_password, $password)) {
            Auth::user()->update([
                'password' => $request->new_password
            ]);

            return back()->with('success', 'Your Password has changed');
        }

        return back()->with('failed', 'Old Password is Incorrect');
    }
}
