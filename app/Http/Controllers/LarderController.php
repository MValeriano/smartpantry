<?php

namespace App\Http\Controllers;

use App\Models\Larder;
use App\Models\Product;
use Illuminate\Http\Request;

class LarderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $larderItems = Larder::with('product')->get();

        return view('larders.index', compact('larderItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        return view('larders.create', compact('products'));
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
            'product_id' => 'required',
            'quantity' => 'required|integer',
            'product_shelf' => 'required|date',
        ]);

        Larder::create($request->all());

        return redirect()->route('larders.index')
            ->with('success', 'Item adicionado à despensa com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::all();

        return view('larders.edit', compact('larder', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|integer',
            'product_shelf' => 'required|date',
        ]);

        $larder->update($request->all());

        return redirect()->route('larders.index')
            ->with('success', 'Item da despensa atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $larder = Larder::findOrFail($id);
        $larder->delete();
    
        return redirect()->route('larders.index')
            ->with('success', 'Item da despensa excluído com sucesso.');
    }
    
}
