<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(name="Home")
 */
class HomeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/home",
     *     summary="Mostrar o painel de controle da aplicação",
     *     tags={"Home"},
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalProducts = Product::count();

        $totalCategories = Category::count();

        $itemsDespensa = 50;

        $Productspertofim = 5;

        $Produtosavencer = 10;

        // Dados para o gráfico de produtos por categoria
        $categories = Category::withCount('products')->get();
        $categoryNames = $categories->pluck('category_name')->toArray();
        $categoryQuantities = $categories->pluck('products_count')->toArray();
        $categoryColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'];

        return view('dashboard', compact('Produtosavencer', 'Productspertofim', 'totalProducts', 'totalCategories', 'itemsDespensa', 'categoryNames', 'categoryQuantities', 'categoryColors'));
    }

    /**
     * @OA\Get(
     *     path="/api/home/pagina-inicial",
     *     summary="Mostrar a página inicial",
     *     tags={"Home"},
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * Show the dashboard page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function paginaInicial()
    {
        return view('dashboard');
    }
}
