<?php

namespace App\Http\Controllers;

use App\Product;
use App\Variant;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
 

        return view('products.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variants = Variant::all();
        return view('products.create',['variants' => $variants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $productStore = Product::create([
                            'product_name'=> $request -> input('product_name'),
                            'product_desc'=> $request -> input('product_desc'),
                            'variant_id'=> $request -> input('variant_id'),
                            'production_date'=> $request ->input('production_date')
                        ]);

            if($productStore){
                return redirect()->route('products.index')->with('success','Product added successfully');
            }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();

        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = Product::find($product->id);
        $variants = Variant::all();

        return view('products.edit',[
                  'variants' => $variants,
                  'product' => $product,
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
      $productUpdate = Product::where('id', $product->id)->
            update([
            'product_name'=> $request->product_name,
            'product_desc'=> $request->product_desc,
            'variant_id'=> $request->variant_id,
            'production_date'=> $request->production_date,
            ]);
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $data = Product::find($product->id);
        if ($data->delete()) {
            return redirect()->route('products.index')->with('success','Product deleted successfully');
        }
    }
}
