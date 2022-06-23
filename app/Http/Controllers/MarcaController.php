<?php

namespace App\Http\Controllers;

use App\Models\Marca as Marca;
use App\Http\Resources\Marca as MarcaResource;
use App\Http\Controllers\BaseController;
use App\Http\Requests\MarcaRequest;
use App\Repositories\MarcaRepositoryInterface as MarcaRepositoryInterface;

class MarcaController extends BaseController
{
    private $marcaRepository;
  
    public function __construct(MarcaRepositoryInterface $marcaRepository)
    {
        $this->marcaRepository = $marcaRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = $this->marcaRepository->all();

        return $this->sendResponse(MarcaResource::collection($marcas), 'Marcas carregadas com sucesso.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\MarcaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarcaRequest $request)
    {
        $marca = $this->marcaRepository->create([
            'nome' => $request->nome,
        ]);

        if ($marca)
            return $this->sendResponse(new MarcaResource($marca), 'Marca criada com sucesso.');

        return $this->sendError('Erro. Problema ao salvar os dados.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca = $this->marcaRepository->find($id);
  
        if (is_null($marca)) {
            return $this->sendError('Marca não encontrada.');
        }
   
        return $this->sendResponse(new MarcaResource($marca), 'Marca encontrada com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarcaRequest $request, $id)
    {
        $input = $request->all();

        $marca = $this->marcaRepository->find($id);   
        $marca->nome = $input['nome'];
        $marca->save();
   
        if (new MarcaResource($marca))
            return $this->sendResponse(new MarcaResource($marca), 'Marca alterada com sucesso.');

        return $this->sendError('Erro. Problema ao salvar os dados.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = $this->marcaRepository->find($id);

        if ($marca->delete())
            return $this->sendResponse([], 'Marca deletada com sucesso.');

        return $this->sendError('Erro. Problema ao deletar os dados.');
    }
}
