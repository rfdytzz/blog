<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $totalUser = User::count();
        $totalPost = Post::count();
        $totalArticle = Post::where('category', 'article')->count();
        $totalStory = Post::where('category', 'story')->count();

        return view('dashboard', [
            'user' => $user,
            'totalArticle' => $totalArticle,
            'totalStory' => $totalStory,
            'labels' => ['Total User', 'Total Post', 'Total Article', 'Total Story'],
            'data' => [$totalUser, $totalPost, $totalArticle, $totalStory]
        ]);
    }
    public function alluser(Request $request)
    {
        $user = Auth::user();
        $query = User::query()->where('role', 'user');
        $post = Post::with('user')->get();

        $userPerDay = User::where('created_at', '>=', now()->subDays(7))
                        ->groupBy('date')
                        ->orderBy('date')
                        ->get([
                            DB::raw('DATE(created_at) as date'),
                            DB::raw('count(*) as total')
                        ])
                        ->pluck('total', 'date');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $data = $query->get();

        return view('alluser', [
            'user' => $user,
            'post' => $post,
            'data' => $data,
            'labels' => $userPerDay->keys(),
            'total' => $userPerDay->values(),
        ]);
    }
}
