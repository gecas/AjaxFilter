<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Color;
use App\ProductStatement;
use Image;
use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\FilterProductsRequest;
use Illuminate\Support\Facades\Input;
use DB;

class ProductsController extends Controller
{
    protected $_photo_path = 'images/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category', 'color')->get();
        
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $colors = Color::all();

        return view('admin.products.create', compact('categories', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = new Product;

        $product->title = $request->title;
        $product->slug = str_slug($request->title);
        $product->price = $request->price;
        $product->size = $request->size;
        $product->category_id = $request->category;
        $product->color_id = $request->color;

        if ($request->file('file')) {

            $path = $this->_photo_path;
            $file = $request->file('file');
            $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();

            $file->move($path, $name);

            $product->image_path = $path;
            $product->image_name = $name;
            $img = Image::make($path.$name)->resize(250,300);            

            if(\File::isFile($path.$name)){
            \File::delete($path.$name);
            }
            $img->save($path.$name);

        }


        $product->save();

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $product = Product::findOrFail($id);

       if( $product ){
       
       $path = $product->image_path;
       $name = $product->image_name;
       $file = $path.$name;
       
       if(\File::isFile($file)){
            \File::delete($file);
        }
    }
    
       $product->delete();
       return redirect('/products');
    }

    public function fetchAllProducts()
    {        
        $products = Product::latest()->get();
        return response()->json($products);
    }

    public function fetchColorProducts(FilterProductsRequest $request)
    {
        $c = $request->colors;
        $s = $request->sizes;
        $s = array_map(function($word) { return strtoupper($word); }, $s);

        $colores = Color::whereIn('slug', $c)->with('products')->get();
        $products = array();
        if(!empty($c)){

        foreach ($colores as $color) {
            if(!empty($s)){
                $pr = $color->products->whereIn('size', $s);
            }else{
                $pr = $color->products;
            }
            foreach ($pr as $product) {
                $products[] = $product;
            }
        }
    }else{
        $products = Product::whereIn('size', $s)->get();
    }
        return response()->json($products);

    }
}
//nera spalvos
// :DD
//tu paimi pagal spalva o veliau pagal dydi
// aha :DD
//siaip blogai
//nes jei nebus size tai nebus ir prekiu :D
//wtf :DD aha  :D
//cia bus biski mano feilas, DB viskas is mazosios, o cia is didziosios ar tai atvriksciai :D 
//reik padidint :D