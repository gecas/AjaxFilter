<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use App\Http\Requests;
use App\Http\Requests\CreateColorRequest;

class ColorsController extends Controller
{
    public function index()
    {
    	$colors = Color::latest()->get();

    	return view('admin.colors.index', compact('colors'));
    }

    public function create()
    {
    	return view('admin.colors.create');
    }

    public function store(CreateColorRequest $request)
    {
    	$color = Color::create([
    		'title'=> $request->color,
    		'slug'=>str_slug($request->color)
    	]);

    	return redirect('/colors');
    }
}
