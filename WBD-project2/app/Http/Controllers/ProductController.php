<?php

namespace App\Http\Controllers;

use App\Http\Requests\Validate;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all();
        return view('product.index',compact('products'));
    }
    public function create(){
        $categorys = Category::all();
        return view('product.create',compact('categorys'));
    }
    public function store(Validate $request){
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->active = $request->active;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('index');

    }
    public function edit($id){
        $product = Product::findOrFail($id);
        return view('product.edit',compact('product'));
    }
    public function update(Validate $request, $id){
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->active = $request->active;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('index');

    }
    public function active(){
        $products = Product::where("active", 1)->get();
        return view('product.index',compact('products'));
    }
    public function inActive(){
        $products = Product::where("active", 0)->get();
        return view('product.index',compact('products'));
    }
    public function thongke(){
        $categories = Category::all();
        return view('product.thongke',compact('categories'));
    }


}
