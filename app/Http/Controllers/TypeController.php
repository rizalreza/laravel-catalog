<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $types = Type::paginate(5);


        return view('types.index',['types' => $types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeStore = Type::create([
                            'type'=> $request -> input('type')
                        ]);
        return redirect()->route('types.index')->with('success','Type added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type::find($id);

        return view('types.show', ['type' => $type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $type = Type::find($type->id);
        return view('types.edit',['type'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $typeUpdate = Type::where('id', $type->id)->update([
                'type' =>$request->input('type')
            ]);
        return redirect()->route('types.index')->with('success','Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $data = Type::find($type->id);
        if ($data->delete()) {
            return redirect()->route('types.index')->with('success','Type deleted successfully');
        }
    }
}
