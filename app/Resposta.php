<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'valor', 'resposta_texto', 'pergunta_id', 'entrevistado_id', 'data_hora'
    ];

    public function pergunta(){
    	return belongsTo('App\Pergunta');
    }
    public function entrevistado(){
    	return belongsTo('App\Entrevistado');
    }
}
