<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    public function index()
    {
    	$categories = Category::latest()->get();

    	return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
    	return view('admin.categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
    	$category = new Category;

    	$category->title = $request->category;
    	$category->slug = str_slug($request->category);
    	$category->color_code = $request->color;

    	$category->save();

    	return redirect()->back();
    }

    public function edit($id)
    {
    	$category = Category::findOrFail($id);

    	return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
    	$category = Category::findOrFail($id);

    	$category->title = $request->category;
    	$category->slug = str_slug($request->category);
    	$category->color_code = $request->color;

    	$category->save();

    	return redirect()->back();
    }
}
