<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.user.login');
    }

    public function registerPage()
    {
        return view('auth.user.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::User();
            if ($user->role == 'admin') {
                return redirect()->intended('/dashboard');
            }
            return redirect()->intended('/');
        }

        return back()->with('failed', 'Incorrect Email or Password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Your account Successfuly Logged Out');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'password' => $request->password,
            'role' => 'user'
        ]);

        return redirect()->route('login')->with('success', 'Your Account has been Added');
    }

    public function profile()
    {
        $user = Auth::user();
        $data = User::all();
        return view('profile', compact('user', 'data'));
    }

    public function update_user(Request $request, $id)
    {
        $request->validate([
            'avatar' => 'nullable|mimes:jpg,png,jpeg,webp',
            'name' => 'required',
            'phone_number' => 'required',
            'birthdate' => 'required',
            'gender' => 'required'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender
        ]);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatar', 'public');

            $user->update([
                'avatar' => $path
            ]);
        }

        return back()->with('success', 'Your Account Updated');
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
}
