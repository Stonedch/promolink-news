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

        $post->fill($request->all());
        $post->save();

        return $post;
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
    }
}
