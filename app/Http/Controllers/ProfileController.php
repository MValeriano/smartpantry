<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(name="Profile")
 */
class ProfileController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/profiles",
     *     summary="Listar todos os perfis de acesso",
     *     tags={"Profile"},
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
        $user = Auth::user(); 

        if($user->profile_id <> 1)
            return view('profiles.reservedarea');

        return view('profiles.index', ['profiles' => $profiles]);
    }

    /**
     * @OA\Get(
     *     path="/api/profiles/create",
     *     summary="Mostrar o formulário de criação de perfil de acesso",
     *     tags={"Profile"},
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
        $profiles = Profile::all();
    
        return view('profiles.create', compact('profiles'));
    }

    /**
     * @OA\Post(
     *     path="/api/profiles",
     *     summary="Criar um novo perfil de acesso",
     *     tags={"Profile"},
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
            'name' => 'required|max:100',
        ]);

        Profile::create($request->all());

        return redirect()->back()->with('success', 'Perfil de acesso criado com sucesso!');
    }

    /**
     * @OA\Get(
     *     path="/api/profiles/{profile}",
     *     summary="Mostrar detalhes de um perfil de acesso",
     *     tags={"Profile"},
     *     @OA\Parameter(
     *         name="profile",
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    /**
     * @OA\Get(
     *     path="/api/profiles/{profile}/edit",
     *     summary="Mostrar o formulário de edição de perfil de acesso",
     *     tags={"Profile"},
     *     @OA\Parameter(
     *         name="profile",
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    /**
     * @OA\Put(
     *     path="/api/profiles/{profile}",
     *     summary="Atualizar um perfil de acesso",
     *     tags={"Profile"},
     *     @OA\Parameter(
     *         name="profile",
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $profile->update($request->all());

        return redirect()->back()->with('success', 'Perfil de acesso atualizado com sucesso!');
    }

    /**
     * @OA\Delete(
     *     path="/api/profiles/{profile}",
     *     summary="Excluir um perfil de acesso",
     *     tags={"Profile"},
     *     @OA\Parameter(
     *         name="profile",
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect()->back()->with('success', 'Perfil de acesso excluído com sucesso!');
    }
}