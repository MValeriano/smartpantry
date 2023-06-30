<?php

namespace App\Http\Controllers;

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
        return view('main');
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
     * Show the main page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function paginaInicial()
    {
        return view('main');
    }

    /**
     * @OA\Get(
     *     path="/api/home/teste",
     *     summary="Mostrar a página de teste",
     *     tags={"Home"},
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function teste()
    {
        return view('teste');
    }
}
