<?php

namespace App\Http\Controllers;

use App\Models\EmporiumProduct;
use App\Models\Emporium;
use App\Models\Product;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(name="Emporium Product")
 */
class EmporiumProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/emporium-products",
     *     summary="Listar produtos da loja",
     *     description="Obtém uma lista de produtos de todas as lojas",
     *     operationId="index",
     *     tags={"Emporium Product"},
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function index()
    {
        $emporiums = Emporium::with('products')->get();
        $user = Auth::user(); 

        if(($user->profile_id === 1) || ($user->profile_id === 2) )
            return view('partnersproducts.index', compact('emporiums'));
        else
            return view('partnersproducts.reservedarea');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/emporiums/{emporium}/products/create",
     *     summary="Exibir formulário de criação de produto da loja",
     *     description="Exibe o formulário para criar um novo produto para a loja",
     *     operationId="create",
     *     tags={"Emporium Product"},
     *     @OA\Parameter(
     *         name="emporium",
     *         description="Loja",
     *         required=true,
     *         in="path",
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
     */
    public function create(Emporium $emporium)
    {
        $products = Product::all();

        return view('partnersproducts.create', compact('emporium', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
     *     path="/api/emporium-products",
     *     summary="Armazenar um novo produto da loja",
     *     description="Armazena um novo produto para a loja",
     *     operationId="store",
     *     tags={"Emporium Product"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="product_id", type="integer"),
     *             @OA\Property(property="emporium_id", type="integer")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     */
    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $emporium_id = $request->input('emporium_id');

        $product = Product::findOrFail($product_id);

        $emporium = Emporium::findOrFail($emporium_id);
        $emporium->products()->attach($product);

        return redirect()->route('EmporiumProduct.show', $emporium_id);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emporium  $emporium
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/api/emporiums/{emporium}/products",
     *     summary="Exibir produtos da loja",
     *     description="Exibe os produtos de uma determinada loja",
     *     operationId="show",
     *     tags={"Emporium Product"},
     *     @OA\Parameter(
     *         name="emporium",
     *         description="Loja",
     *         required=true,
     *         in="path",
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
     */
    public function show(Emporium $emporium)
    {
        $emporium = Emporium::with('products')->findOrFail($emporium->id);
        return view('partnersproducts.show', compact('emporium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmporiumProduct  $emporiumProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(EmporiumProduct $emporiumProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmporiumProduct  $emporiumProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmporiumProduct $emporiumProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emporium  $emporium
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     *
     * @OA\Delete(
     *     path="/api/emporiums/{emporium}/products/{product}",
     *     summary="Remover um produto da loja",
     *     description="Remove um produto da loja",
     *     operationId="destroy",
     *     tags={"Emporium Product"},
     *     @OA\Parameter(
     *         name="emporium",
     *         description="Loja",
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="product",
     *         description="Produto",
     *         required=true,
     *         in="path",
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
     */
    public function destroy(Emporium $emporium, Product $product)
    {
        $emporium->products()->detach($product);

        return redirect()->route('partnersproducts.show', $emporium->id);
    }
}