<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|string|min:5|max:2000',
        ]);

        Category::create([
            'name' => $request->name,
            'user_id' => auth()->id()
        ]);

        return response()->json([
            'data' => [
                'category_id' => $category->id,
            ],
            'message' => 'Category save successfully!'
        ], 200);
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|string|min:5|max:2000',
        ]);

        $category->update([
            'name' => $request->name,
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'data' => [
                'category_id' => $category->id,
            ],
            'message' => 'Category updated successfully!'
        ], 200);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'data' => [
                'category_id' => $category->id,
            ],
            'message' => 'Category delete successfully!'
        ], 200);
    }
}