<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = 5;
        $categories = Category::all();
        $search = $request->input('search');

        if ($search) {
            $posts = Post::where('is_draft', false)
                ->where('is_publicated', true)
                ->where('publicated_at', '<=', now())
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('user_id', User::where('name', 'LIKE', "%{$search}%")->get('id')->toArray() ?: [])
                ->paginate($paginate);
        } else {
            $posts = Post::where('is_draft', false)
                ->where('is_publicated', true)
                ->where('publicated_at', '<=', now())
                ->paginate($paginate);
        }

        return view('post.list', [
            'categories' => $categories,
            'posts' => $posts,
            'search' => $search,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('post.detail', [
            'post' => Post::where('slug', $slug)->firstOrFail(),
        ]);
    }
}
