<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::all();

        return response()->json([
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'subtitle' => 'required',
            'category' => 'required',
            'content' => 'required',
        ]);

        $path = null;

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnail', 'public');
        }

        $user = Auth::user();

        $data = Post::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'category' => $request->category,
            'content' => $request->content,
            'user_id' => $user->id,
            'thumbnail' => $path,
        ]);

        return response()->json([
            'message' => 'Data created Successfully',
            'data' => $data
        ], 201);
    }

    public function show($id) {
        $data = Post::findOrFail($id);

        return response()->json([
            'data' => $data
        ]);
    }

    public function update(Post $post, Request $request)
    {
        $request->validate([
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'subtitle' => 'required',
            'category' => 'required',
            'content' => 'required',
        ]);

        $path = $post->thumbnail;

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnail', 'public');
        }

        $user = Auth::user();

        $post->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'category' => $request->category,
            'content' => $request->content,
            'user_id' => $user->id,
            'thumbnail' => $path,
        ]);

        return response()->json([
            'message' => 'Data updated Successfully',
            'data' => $post
        ]);
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json([
            'delete' => $post
        ]);
    }
}
