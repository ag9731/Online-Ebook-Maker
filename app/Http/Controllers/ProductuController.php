<?php

namespace App\Http\Controllers;

use App\Models\Productu;
use Illuminate\Http\Request;

class ProductuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsu = Productu::latest()->paginate(5);
  
        return view('productsu.index',compact('productsu'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productsu.create');
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
  
        Productu::create($request->all());
   
        return redirect()->route('productsu.index')
                        ->with('success','Productu created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Productu $productu)
    {
        return view('productsu.show',compact('productu'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Productu $productu)
    {
        return view('productsu.edit',compact('productu'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productu $productu)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        $productu->update($request->all());
  
        return redirect()->route('productsu.index')
                        ->with('success','Productu updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productu $productu)
    {
        $productu->delete();
  
        return redirect()->route('productsu.index')
                        ->with('success','Productu deleted successfully');
    }
}
