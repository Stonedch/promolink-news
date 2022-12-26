<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $category = new Category;

        $category->fill($request->all());
        $category->save();

        return $category;
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->fill($request->all());
        $category->save();

        return $category;
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
    }
}
