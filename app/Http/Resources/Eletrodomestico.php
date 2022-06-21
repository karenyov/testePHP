<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Eletrodomestico extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'marca_id' => $this->marca_id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'tensao' => $this->tensao,
            'marca' => $this->marca->nome,
        ];
    }
}
