<?php

namespace App\Http\Controllers;

use App\Models\Eletrodomestico as Eletrodomestico;
use App\Http\Resources\Eletrodomestico as EletrodomesticoResource;
use App\Http\Controllers\BaseController;
use App\Http\Requests\EletrodomesticoRequest;

class EletrodomesticoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eletrodomestico = Eletrodomestico::all();
        return $this->sendResponse(EletrodomesticoResource::collection($eletrodomestico), 'Eletrodoméstico carregadas com sucesso.');
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
     * @param \App\Http\Requests\EletrodomesticoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EletrodomesticoRequest $request)
    {
        $eletrodomestico = Eletrodomestico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'tensao' => $request->tensao,
            'marca_id' =>  $request->marca_id,
        ]);

        if ($eletrodomestico)
            return $this->sendResponse(new EletrodomesticoResource($eletrodomestico), 'Eletrodoméstico criado com sucesso.');

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
        $eletrodomestico = Eletrodomestico::find($id);
  
        if (is_null($eletrodomestico)) {
            return $this->sendError('Eletrodoméstico não encontrada.');
        }
   
        return $this->sendResponse(new EletrodomesticoResource($eletrodomestico), 'Eletrodoméstico encontrada com sucesso.');
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
     * @param \App\Http\Requests\EletrodomesticoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EletrodomesticoRequest $request, $id)
    {
        $input = $request->all();

        $eletrodomestico = Eletrodomestico::find($id);   
        $eletrodomestico->nome = $input['nome'];
        $eletrodomestico->descricao = $input['descricao'];
        $eletrodomestico->tensao = $input['tensao'];
        $eletrodomestico->marca_id = $input['marca_id'];

        if ($eletrodomestico->save())
            return $this->sendResponse(new EletrodomesticoResource($eletrodomestico), 'Eletrodoméstico alterado com sucesso.');

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
        $eletrodomestico = Eletrodomestico::find($id);

        if ($eletrodomestico->delete())
            return $this->sendResponse([], 'Eletrodoméstico deletada com sucesso.');

        return $this->sendError('Erro. Problema ao deletar os dados.');
    }
}
