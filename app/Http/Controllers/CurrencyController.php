<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::paginate(5);


        return view('currencies.index',['currencies' => $currencies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataStore = Currency::create([
                            'currency'=> $request -> input('currency')
                        ]);
        return redirect()->route('currencies.index')->with('success','Currency added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currency = Currency::find($id);

        return view('currencies.show', ['currency' => $currency]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        $currency = Currency::find($currency->id);
        return view('currencies.edit',['currency'=>$currency]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        $dataUpdate = Currency::where('id', $currency->id)->update([
                'currency' =>$request->input('currency')
            ]);
        return redirect()->route('currencies.index')->with('success','Currency updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $data = Currency::find($currency->id);
        if ($data->delete()) {
            return redirect()->route('currencies.index')->with('success','Currency deleted successfully');
        }
    }
}
