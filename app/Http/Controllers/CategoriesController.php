<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoriesStoreRequest;
use App\Http\Requests\CategoriesRequest;
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

    public function store(CategoriesRequest $request, Category $category)
    {
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

    public function update(CategoriesRequest $request, Category $category)
    {
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