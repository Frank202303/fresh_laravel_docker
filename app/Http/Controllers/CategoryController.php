<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->getParentCategories();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =  $this->getParentCategories();
        return view('dashboard.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //return $request; For Test
        $category = new Category();
        $category->name =  $request->name;
        $category->parent_id =  $request->parent_id;
        $category->slug = Str::slug($request->name);

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // return $request;  For TEST
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted.');
    }
    public function getParentCategories()
    {
        return Category::with('subcategories')->whereNull('parent_id')->get();
    }
}
