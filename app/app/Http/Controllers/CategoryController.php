<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $id)
    {
        $paginate = 5;
        $search = $request->input('search');
        $category = Category::findOrFail($id);
        $posts = $category->posts();

        if ($search) {
            $posts = Post::where('title', 'LIKE', "%{$search}%")
                ->orWhere('user_id', User::where('name', 'LIKE', "%{$search}%")->get('id')->toArray() ?: []);
        }

        $posts = $posts->paginate($paginate);

        return view('category.posts', [
            'category' => $category,
            'posts' => $posts,
            'search' => $search,
        ]);
    }
}
