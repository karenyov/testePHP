<?php
namespace App\Repositories;

use App\Models\Eletrodomestico;
use Illuminate\Support\Collection;

interface EletrodomesticoRepositoryInterface
{
   public function all(): Collection;
}