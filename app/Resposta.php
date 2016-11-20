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

    public pergunta(){
    	return belongsTo('App\Pergunta');
    }
    public entrevistado(){
    	return belongsTo('App\Entrevistado');
    }
}
