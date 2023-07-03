<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="SmartPantry",
 *     version="1.0.0",
 *     description="Sistema de controle lista de compras e de dispensa "
 * )
 * @OA\Tag(name="Categories")
 */
class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/categories",
     *     summary="Obter lista de categorias",
     *     description="Retorna uma lista de todas as categorias",
     *     operationId="getCategories",
     *     tags={"Categories"},
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('categories.index', compact('categories'));       
    }

    public function create()
    {
        return view('categories.create');
    }

    /**
     * @OA\Post(
     *     path="/api/categories",
     *     summary="Criar uma nova categoria",
     *     description="Cria uma nova categoria com base nos dados fornecidos",
     *     operationId="storeCategory",
     *     tags={"Categories"}, 
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="category_name", type="string"),
     *             @OA\Property(property="category_description", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Categoria criada com sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:100',
            'category_description' => 'required|max:150',
        ]);

        $category = Category::create($request->all());

        return redirect()->route('categories.create')
            ->with('success', 'Categoria criada com sucesso.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * @OA\Get(
     *     path="/api/categories/{category}",
     *     summary="Obter os detalhes de uma categoria",
     *     description="Retorna os detalhes de uma categoria específica",
     *     operationId="getCategory",
     *     tags={"Categories"},
     *     @OA\Parameter(
     *         name="category",
     *         in="path",
     *         description="ID da categoria",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * @OA\Put(
     *     path="/api/categories/{category}",
     *     summary="Atualizar uma categoria",
     *     description="Atualiza uma categoria existente com base nos dados fornecidos",
     *     operationId="updateCategory",
     *     tags={"Categories"},
     *     @OA\Parameter(
     *         name="category",
     *         in="path",
     *         description="ID da categoria",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="category_name", type="string"),
     *             @OA\Property(property="category_description", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Categoria atualizada com sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|max:100',
            'category_description' => 'required|max:150',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
        ->with('success', 'Categoria atualizada com sucesso.');
    }

    /**
     * @OA\Delete(
     *     path="/api/categories/{category}",
     *     summary="Excluir uma categoria",
     *     description="Exclui uma categoria existente",
     *     operationId="deleteCategory",
     *     tags={"Categories"}, 
     *     @OA\Parameter(
     *         name="category",
     *         in="path",
     *         description="ID da categoria",
     *         required=true,
     *         @OA\Schema(type="integer", format="int64")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Categoria excluída com sucesso"
     *     )
     * )
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
        ->with('success', 'Categoria excluída com sucesso.');
    }
}
