<?php
namespace App\Repositories;

use App\Models\Marca;
use Illuminate\Support\Collection;

interface MarcaRepositoryInterface
{
   public function all(): Collection;
}