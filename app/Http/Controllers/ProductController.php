<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all();

        //dari Product model amik all data jadi Product::all()
        //masuk dalam variable $products
        //jadi sebagai array compact
        //pergi ke products/index.blade.php
        //products.index is the location of the blade page
        return view('products.index', compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    //Request $request allow u to retrieve and access data that made through applciation 
    //kita bulih retrieve data kalau user key in dalam form dll
    public function store(Request $request){
        //to check data inserted successfull or not
        // dd($request);
        // dd($request->name);
        $data = $request -> validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable',
        ]);

        $newProduct= Product::create($data);
        return redirect(route('product.index'));
    }

    public function edit(Product $product){

        return view('products.edit', compact('product'));

    }

   public function update(Product $product, Request $request){

    $data = $request -> validate([
        'name' => 'required',
        'qty' => 'required|numeric',
        'price' => 'required|decimal:0,2',
        'description' => 'nullable',
    ]);

    $product -> update($data);
    return redirect(route('product.index'))-> with("success", "Product Update Successfully");
   }

//    $product receive from route {product}
   public function destroy(Product $product){
        $product ->delete();
        return redirect(route('product.index'))-> with("success", "Product Update Successfully");
   }
}
