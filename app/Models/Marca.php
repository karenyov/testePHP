<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public $timestamps = true;

    protected $with = ['marca'];

    protected $guarded = [];
    protected $fillable = ['nome', 'descricao', 'tensao', 'marca_id'];

    /**
     * Get the Marca that owns the Eletrodomestico
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id', 'id');
    }
}
