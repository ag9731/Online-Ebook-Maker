<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productss = Products::latest()->paginate(5);
  
        return view('productss.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function view()
    {
        $products = Products::latest()->paginate(5);
    
        return view('products.view',compact('products'))
               ->with('i', (request()->input('page', 1) - 1) * 5);

    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productss.create');
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
  
        Products::create($request->all());
   
        return redirect()->route('productss.index')
                        ->with('success','Products created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        return view('productss.show',compact('products'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        return view('productss.edit',compact('products'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        $products->update($request->all());
  
        return redirect()->route('productss.index')
                        ->with('success','Products updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
