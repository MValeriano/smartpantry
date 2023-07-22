<?php

namespace App\Http\Controllers;

use App\Models\Emporium;
use App\Models\GeoreferencingAddress;
use App\Models\Address;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(name="Emporiums")
 */
class EmporiumController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/emporiums",
     *     summary="Obter lista de estabelecimentos",
     *     description="Retorna uma lista de todos os estabelecimentos",
     *     operationId="getEmporiums",
     *     tags={"Emporiums"},
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
        $emporiums = Emporium::all();

        $user = Auth::user(); 

        if($user->profile_id == 2 || $user->profile_id == 1)
            return view('emporiums.index', compact('emporiums'));
        else    
            return view('emporiums.reservedarea');
        
    }

    /**
     * @OA\Get(
     *     path="/api/emporiums/create",
     *     summary="Mostrar formulário de criação",
     *     description="Exibe o formulário para criar um novo estabelecimento",
     *     operationId="showCreateEmporiumForm",
     *     tags={"Emporiums"},
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emporiums.create');
    }

    /**
     * @OA\Post(
     *     path="/api/emporiums",
     *     summary="Criar um novo estabelecimento",
     *     description="Cria um novo estabelecimento com base nos dados fornecidos",
     *     operationId="storeEmporium",
     *     tags={"Emporiums"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="address_street", type="string"),
     *             @OA\Property(property="address_number", type="string"),
     *             @OA\Property(property="address_district", type="string"),
     *             @OA\Property(property="address_city", type="string"),
     *             @OA\Property(property="address_state", type="string"),
     *             @OA\Property(property="address_zipcode", type="string"),
     *             @OA\Property(property="x_coordinate", type="string"),
     *             @OA\Property(property="y_coordinate", type="string"),
     *             @OA\Property(property="emporium_name", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Estabelecimento criado com sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = Address::create([
            'address_street' => $request->input('address_street'),
            'address_number' => $request->input('address_number'),
            'address_district' => $request->input('address_district'),
            'address_city' => $request->input('address_city'),
            'address_state' => $request->input('address_state'),
            'address_zipcode' => $request->input('address_zipcode'),
        ]);

        $georeferencingAddress = GeoreferencingAddress::create([
            'x_coordinate' => $request->input('x_coordinate'),
            'y_coordinate' => $request->input('y_coordinate'),
            'address_id' => $address->id,
        ]);

        $emporium = Emporium::create([
            'name' => $request->input('emporium_name'),
            'georeferencing_address_id' => $georeferencingAddress->id,
        ]);

        return redirect()->route('emporiums.create')
        ->with('success', 'Parceiro criada com sucesso.', $emporium->id);
    }

    /**
     * @OA\Get(
     *     path="/api/emporiums/{emporium}",
     *     summary="Obter detalhes do estabelecimento",
     *     description="Retorna os detalhes de um estabelecimento específico",
     *     operationId="getEmporium",
     *     tags={"Emporiums"},
     *     @OA\Parameter(
     *         name="emporium",
     *         in="path",
     *         description="ID do estabelecimento",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * @param  \App\Models\Emporium  $emporium
     * @return \Illuminate\Http\Response
     */
    public function show(Emporium $emporium)
    {
        $emporium->load('georeferencingAddress.address');

        return view('emporiums.show', compact('emporium'));
    }

    /**
     * @OA\Get(
     *     path="/api/emporiums/{emporium}/edit",
     *     summary="Mostrar formulário de edição",
     *     description="Exibe o formulário para editar um estabelecimento",
     *     operationId="showEditEmporiumForm",
     *     tags={"Emporiums"},
     *     @OA\Parameter(
     *         name="emporium",
     *         in="path",
     *         description="ID do estabelecimento",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * @param  \App\Models\Emporium  $emporium
     * @return \Illuminate\Http\Response
     */
    public function edit(Emporium $emporium)
    {
        $georeferencingAddress = $emporium->georeferencingAddress;
        $address = $georeferencingAddress->address;
        $addresses = Address::all();
        
        return view('emporiums.edit', compact('emporium', 'georeferencingAddress', 'address', 'addresses'));
    }
    
    /**
     * @OA\Put(
     *     path="/api/emporiums/{emporium}",
     *     summary="Atualizar estabelecimento",
     *     description="Atualiza um estabelecimento existente com base nos dados fornecidos",
     *     operationId="updateEmporium",
     *     tags={"Emporiums"},
     *     @OA\Parameter(
     *         name="emporium",
     *         in="path",
     *         description="ID do estabelecimento",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="address_street", type="string"),
     *             @OA\Property(property="address_number", type="string"),
     *             @OA\Property(property="address_district", type="string"),
     *             @OA\Property(property="address_city", type="string"),
     *             @OA\Property(property="address_state", type="string"),
     *             @OA\Property(property="address_zipcode", type="string"),
     *             @OA\Property(property="x_coordinate", type="string"),
     *             @OA\Property(property="y_coordinate", type="string"),
     *             @OA\Property(property="emporium_name", type="string"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Estabelecimento atualizado com sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emporium  $emporium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emporium $emporium)
    {
        $address = $emporium->georeferencingAddress->address;
        $address->update([
            'address_street' => $request->input('address_street'),
            'address_number' => $request->input('address_number'),
            'address_district' => $request->input('address_district'),
            'address_city' => $request->input('address_city'),
            'address_state' => $request->input('address_state'),
            'address_zipcode' => $request->input('address_zipcode'),
        ]);
    
        $georeferencingAddress = $emporium->georeferencingAddress;
        $georeferencingAddress->update([
            'x_coordinate' => $request->input('x_coordinate'),
            'y_coordinate' => $request->input('y_coordinate'),
        ]);
    
        $emporium->update([
            'name' => $request->input('emporium_name'),
        ]);
    
        return redirect()->route('emporiums.show', $emporium->id);
    }

    /**
     * @OA\Delete(
     *     path="/api/emporiums/{emporium}",
     *     summary="Excluir estabelecimento",
     *     description="Exclui um estabelecimento",
     *     operationId="deleteEmporium",
     *     tags={"Emporiums"},
     *     @OA\Parameter(
     *         name="emporium",
     *         in="path",
     *         description="ID do estabelecimento",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Estabelecimento excluído com sucesso",
     *         @OA\JsonContent()
     *     )
     * )
     *
     * @param  \App\Models\Emporium  $emporium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emporium $emporium)
    {
        //
    }
}
