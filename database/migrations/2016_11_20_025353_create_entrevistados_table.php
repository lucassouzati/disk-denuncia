<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrevistadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrevistados', function(Blueprint $table) {
            $table->increments('id');
            $table->enum('faixa_etaria', ['De 10 a 20 anos', 
                                        'De 21 a 30 anos', 
                                        'De 31 a 40 anos',
                                        'De 41 a 50 anos'
                                        'De 51 a 60 anos',
                                        'Mais de 60 anos']);
            $table->enum('sexo', ['Masculino', 'Feminino']]);
            $table->float('renda_familiar');
            $table->integer('cidade_id');
            $table->boolean('conhece_disk_denuncia')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('entrevistados');
    }
}
