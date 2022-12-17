<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.list', [
            'posts' => Post::where('is_draft', false)->where('is_publicated', true)->where('publicated_at', '<=', now())->paginate(5),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('post.detail', [
            'post' => Post::findOrFail($id),
        ]);
    }
}
