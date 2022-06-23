<?php

namespace App\Repositories\Eloquent;

use App\Models\Marca;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\MarcaRepositoryInterface;
use Illuminate\Support\Collection;

class MarcaRepository extends BaseRepository implements MarcaRepositoryInterface
{

   /**
    * MarcaRepository constructor.
    *
    * @param Marca $model
    */
   public function __construct(Marca $model)
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