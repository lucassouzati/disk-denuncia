<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    public function estado()
    {
    	return $this->belongsTo('App\Estado');
    }
  
    public function entrevistados()
    {
        return $this->hasMany('App\Entrevistado');
    }

    /**
     * Scope a query to only include active users.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDoEstado($query, $estado_id)
    {
        return $query->where('estado_id', $estado_id);
    }
}
