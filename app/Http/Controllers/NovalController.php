<?php

namespace App\Http\Controllers;

use App\Models\Noval;
use Illuminate\Http\Request;

class NovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $novals = Noval::latest()->paginate(5);
  
        return view('novals.index',compact('novals'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novals.create');
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
            'email' => 'required',

            'detail' => 'required',
        ]);
  
        Noval::create($request->all());
   
        return redirect()->route('novals.index')
                        ->with('success','Noval created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Noval $noval)
    {
        return view('novals.show',compact('noval'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Noval $noval)
    {
        return view('novals.edit',compact('noval'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noval $noval)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',

            'detail' => 'required',
        ]);
  
        $noval->update($request->all());
  
        return redirect()->route('novals.index')
                        ->with('success','Noval updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noval $noval)
    {
        $noval->delete();
  
        return redirect()->route('novals.index')
                        ->with('success','Noval deleted successfully');
    }
}
