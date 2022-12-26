<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        $post = new Post;

        $post->fill($request->all());
        $post->user_id = $request->user()->id;
        $post->is_publicated = false;
        $post->save();

        return $post;
    }

    public function show($id)
    {
        return Post::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id == $request->user()->id) {
            $post->fill($request->all());
            $post->save();

            return $post;
        }

        return response(403, 'access denied');
    }

    public function destroy($id)
    {
        if ($post->user_id == $request->user()->id) {
            return response(200, Post::findOrFail($id)->delete());
        }

        return response(403, 'access denied');
    }
}
