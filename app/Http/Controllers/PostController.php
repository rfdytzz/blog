<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('create', compact('user'));
    }

    public function blog(Request $request)
    {
        $user = Auth::user();
        $query = Post::with('user');

        if ($request->filter) {
            $query->where('category', $request->filter);
        }

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhereRelation('user', 'name', 'like', '%' . $request->search . '%');
        }

        $data = $query->latest()->get();

        return view('blog', compact('user', 'data'));
    }

    public function create_post(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);

        $user = Auth::id();

        Post::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'category' => $request->category,
            'content' => $request->content,
            'user_id' => $user
        ]);

        return redirect('/blog')->with('success', 'Your blog Added');
    }

    public function blog_detail($id)
    {
        $user = Auth::user();
        $data = Post::FindOrFail($id);
        return view('detail', compact('user', 'data'));
    }
}
