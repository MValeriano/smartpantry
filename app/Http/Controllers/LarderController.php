<?php

namespace App\Http\Controllers;

use App\Models\Larder;
use App\Models\LarderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LarderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        $larderItems = Product::whereHas('larders', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['larders' => function ($query) use ($user) {
            $query->where('user_id', $user->id)->select('larders_products.id', 'quantity', 'expiration_date');
        }])->paginate(5);
    
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
            'product_id' => 'required|array',
            'product_id.*' => 'exists:products,id',
            'quantity' => 'required|array',
            'quantity.*' => 'integer|min:1',
            'expiration_date' => 'required|array',
            'expiration_date.*' => 'date'
        ]);
    
        $user = Auth::user();
    
        $larder = Larder::where('user_id', $user->id)->first();
        
        if (!$larder) {
            $larder = Larder::create([
                'user_id' => $user->id,
            ]);
        }
    
        for ($i = 0; $i < count($request->product_id); $i++) {
            $productId = $request->product_id[$i];
            $quantity = $request->quantity[$i];
            $expirationDate = $request->expiration_date[$i];
    
            $larder->products()->attach($productId, [
                'quantity' => $quantity,
                'expiration_date' => $expirationDate,
            ]);
        }
    
        return redirect()->route('larders.create')
            ->with('success', 'Items adicionados à despensa com sucesso.');
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
        $larder = Larder::findOrFail($id);
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
            'expiration_date' => 'required|date',
        ]);

        $larder = Larder::findOrFail($id);
        $larder->products()->sync([$request->product_id => [
            'quantity' => $request->quantity,
            'expiration_date' => $request->expiration_date,
        ]]);

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
