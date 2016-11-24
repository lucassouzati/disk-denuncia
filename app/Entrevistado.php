<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrevistado extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'faixa_etaria', 'sexo', 'renda_familiar', 'raca' ,'cidade_id', 'conhece_disk_denuncia', 'consideracao'
    ];

    public function cidade(){
    	return belongsTo('App\Cidade');
    }
}
