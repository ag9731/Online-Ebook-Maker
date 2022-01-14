<?php

namespace App\Http\Controllers;

use App\Models\Pen;
use Illuminate\Http\Request;

class PenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pens = Pen::latest()->paginate(5);
  
        return view('pens.index',compact('pens'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pens.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        Pen::create($request->all());
   
        return redirect()->route('pens.index')
                        ->with('success','Pen created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Pen $pen)
    {
        return view('pens.show',compact('pen'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Pen $pen)
    {
        return view('pens.edit',compact('pen'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pen $pen)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        $pen->update($request->all());
  
        return redirect()->route('pens.index')
                        ->with('success','Pen updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pen $pen)
    {
        $pen->delete();
  
        return redirect()->route('pens.index')
                        ->with('success','Pen deleted successfully');
    }
}
