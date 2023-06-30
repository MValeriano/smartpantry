<?php

namespace App\Http\Controllers;

use App\Models\SupermarketList;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(name="SupermarketList")
 */
class SupermarketListController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/supermarket_lists/create",
     *     summary="Mostrar o formulário de criação de lista de compras",
     *     tags={"SupermarketList"},
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $supermarketList = new SupermarketList(); 
        return view('supermarket_lists.create', compact('products', 'supermarketList'));
    }

    /**
     * @OA\Post(
     *     path="/api/supermarket_lists",
     *     summary="Criar uma nova lista de compras",
     *     tags={"SupermarketList"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Erro de validação",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'list_name' => 'required',
            'product_id' => 'required|array',
            'product_id.*' => 'exists:products,id',
            'product_quantity' => 'required|array',
            'product_quantity.*' => 'integer|min:1',
        ]);

        $user = Auth::user();

        $supermarketList = $user->supermarketLists()->create([
            'list_name' => $request->input('list_name'),
            'supermarket_list_price_total' => 0,
        ]);

        $products = $request->input('product_id');
        $quantities = $request->input('product_quantity');

        foreach ($products as $index => $productId) {
            $product = Product::find($productId);

            $supermarketList->products()->attach($product, [
                'product_quantity' => $quantities[$index],
                'purchased' => '0',
                'supermarket_list_products_price' => 0,
            ]);
        }

        return redirect()->route('supermarket_lists.show', $supermarketList)
            ->with('success', 'Lista de compras criada com sucesso!');
    }

    /**
     * @OA\Get(
     *     path="/api/supermarket_lists/{supermarketList}",
     *     summary="Mostrar detalhes de uma lista de compras",
     *     tags={"SupermarketList"},
     *     @OA\Parameter(
     *         name="supermarketList",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * Display the specified resource.
     *
     * @param  \App\Models\SupermarketList  $supermarketList
     * @return \Illuminate\Http\Response
     */
    public function show(SupermarketList $supermarketList)
    {
        return view('supermarket_lists.show', compact('supermarketList'));
    }

    /**
     * @OA\Get(
     *     path="/api/supermarket_lists/{supermarketList}/conclude",
     *     summary="Mostrar o formulário de conclusão da lista de compras",
     *     tags={"SupermarketList"},
     *     @OA\Parameter(
     *         name="supermarketList",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * Show the form for concluding the specified resource.
     *
     * @param  \App\Models\SupermarketList  $supermarketList
     * @return \Illuminate\Http\Response
     */
    public function conclude(SupermarketList $supermarketList)
    {
        return view('supermarket_lists.conclude', compact('supermarketList'));
    }    

    /**
     * @OA\Put(
     *     path="/api/supermarket_lists/{supermarketList}",
     *     summary="Atualizar uma lista de compras",
     *     tags={"SupermarketList"},
     *     @OA\Parameter(
     *         name="supermarketList",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Erro de validação",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupermarketList  $supermarketList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupermarketList $supermarketList)
    {
        $request->validate([
            'product_values' => 'required|array',
            'product_values.*' => 'numeric',
            'product_purchased' => 'array',
        ]);
    
        $products = $supermarketList->products;
    
        foreach ($products as $index => $product) {
            $product->pivot->supermarket_list_products_price = $request->input('product_values')[$index];
            $product->pivot->purchased = in_array($product->id, $request->input('product_purchased'), false) ? '1' : '0';
            $product->pivot->save();
        }
    
        return redirect()->route('supermarket_lists.show', $supermarketList)
            ->with('success', 'Lista de compras atualizada com sucesso!');
    }    

    /**
     * @OA\Get(
     *     path="/api/supermarket_lists/{id}/export",
     *     summary="Exportar lista de compras em PDF",
     *     tags={"SupermarketList"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * Export the specified resource to PDF.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exportToPdf($id)
    {
        $supermarketList = SupermarketList::findOrFail($id);
    
        $pdf = PDF::loadView('supermarket_lists.show', compact('supermarketList'));
    
        return $pdf->download('lista_compras.pdf');
    }
}