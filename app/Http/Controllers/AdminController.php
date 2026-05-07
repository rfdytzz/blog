<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
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
            'data' => [$totalUser, $totalPost, $totalArticle, $totalStory],
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
                DB::raw('count(*) as total'),
            ])
            ->pluck('total', 'date');

        if ($request->search) {
            $query->where('name', 'like', '%'.$request.'%')
                ->orWhere('email', 'like', '%'.$request->search.'%');
        }

        $data = $query->latest()->paginate(10);

        return view('alluser', [
            'user' => $user,
            'post' => $post,
            'data' => $data,
            'labels' => $userPerDay->keys(),
            'total' => $userPerDay->values(),
        ]);
    }

    public function allpost(Request $request) {
        $user = Auth::user();
        $query = Post::query();
        $totalPost = Post::count();

        $postPerDay = Post::where('created_at', '>=',now()->subDays(7))
                        ->groupBy('date')
                        ->orderBy('date')
                        ->get([
                            DB::raw('DATE(created_at) as date'),
                            DB::raw('count(*) as total')
                        ])
                        ->pluck('total', 'date');

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('id', 'like', '%' . $request->search . '%');
        }

        $data = $query->latest()->paginate(10);
        
        return view('admin.post', compact('user', 'data', 'totalPost'), [
            'user' => $user,
            'data' => $data,
            'totalPost' => $totalPost,
            'labels' => $postPerDay->keys(),
            'values' => $postPerDay->values()
        ]);
    }
}
