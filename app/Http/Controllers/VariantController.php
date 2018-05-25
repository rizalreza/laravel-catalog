<?php

namespace App\Http\Controllers;


use DB;
use App\Variant;
use App\Type;
use App\Size;
use App\Currency;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variants = Variant::with(['type','size','currency'])->paginate(5);

        // dd($variants);


        return view('variants.index',['variants' => $variants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $sizes = Size::all();
        $currencies = Currency::all();

        return view('variants.create',[
                  'types' => $types, 
                  'sizes' => $sizes,
                  'currencies' => $currencies
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $variantStore = Variant::create([
            'name'=> $request->name,
            'type_id'=> $request->type_id,
            'size_id'=> $request->size_id,
            'currency_id'=> $request->currency_id,
            'price'=> $request->price,
            'discount'=> $request->discount,
            'nett_price'=> $request->price - ($request->price * ($request->discount / 100)) ,
            'stock'=> $request ->input('stock')
            ]);

            if($variantStore){
                return redirect()->route('variants.index')->with('success','Variant added successfully');
            }       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $variant = Variant::where('id', $id)->first();

        return view('variants.show', ['variant' => $variant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function edit(Variant $variant)
    {
        $variant = Variant::find($variant->id);
        $types = Type::all();
        $sizes = Size::all();
        $currencies = Currency::all();

        return view('variants.edit',[
                  'variant' => $variant,
                  'types' => $types, 
                  'sizes' => $sizes,
                  'currencies' => $currencies
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variant $variant)
    {
      $variantUpdate = Variant::where('id', $variant->id)->
            update([
            'name'=> $request->name,
            'type_id'=> $request->type_id,
            'size_id'=> $request->size_id,
            'currency_id'=> $request->currency_id,
            'price'=> $request->price,
            'discount'=> $request->discount,
            'nett_price'=> $request->price - ($request->price * ($request->discount / 100)) ,
            'stock'=> $request->stock
            ]);
        return redirect()->route('variants.index')->with('success','Variant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Variant  $variant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variant $variant)
    {
        //
    }
}
