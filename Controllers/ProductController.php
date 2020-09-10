<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\{Product};

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::orderBy('created_at','desc')->paginate(6);
        return view('home',compact('products'));
    }
    public function create(ProductRequest $request)
    {
       $product = $request->all();
        Product::create($product);
        return redirect()->back();
    }
}
