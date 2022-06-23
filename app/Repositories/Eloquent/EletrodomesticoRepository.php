<?php

namespace App\Repositories\Eloquent;

use App\Models\Eletrodomestico;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\EletrodomesticoRepositoryInterface;
use Illuminate\Support\Collection;

class EletrodomesticoRepository extends BaseRepository implements EletrodomesticoRepositoryInterface
{

   /**
    * EletrodomesticoRepository constructor.
    *
    * @param Eletrodomestico $model
    */
   public function __construct(Eletrodomestico $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();    
   }
}